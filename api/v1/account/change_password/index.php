<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'The requested resource does not support HTTP method ' . $_SERVER['REQUEST_METHOD']]);
    exit;
}
$headers = getallheaders();
if ((!isset($_POST["recovery_token"]) && !isset($headers['Authorization'])) || !isset($_POST["new_password"])) {
    http_response_code(401);
    echo json_encode(['error' => 'Missing parameters']);
    exit;
}
require_once __DIR__ . "/../../../../config/cors.php";
require_once __DIR__ . "/../../../../functions/serverSpecifics.php";
require_once __DIR__ . "/../../../../utils/token/validate.php";
require_once __DIR__ . "/../../../../utils/token/delete.php";
require_once __DIR__ . "/../../../../utils/mail/send.php";

$ProductionLibServerSpecifics = ServerSpecifics::getInstance();
$server_url = $ProductionLibServerSpecifics->fnt_getServerURL();
$DBLINK = $ProductionLibServerSpecifics->fnt_getDBConnection();
$new_password = $_POST['new_password'];


if (isset($_POST["recovery_token"])) {
    $recovery_token = $_POST["recovery_token"];
    $validation = fnt_validateRecoveryPasswordToken_v001($DBLINK, $recovery_token);
    if ($validation === false) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "Invalid or expired token"));
        exit;
    }
    $acco_id = $validation['acco_id'];
    $acco_email = $validation['acco_email'];
} else {
    $auth_header = $headers['Authorization'];
    $data = explode(' ', $auth_header);
    if (count($data) !== 2) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "Invalid or expired token"));
        exit;
    }
    $auth_method = $data[0];
    if($auth_method !== "Bearer"){
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "Invalid or expired token"));
        exit;
    }
    $jwt = $data[1];
    $decoded_jwt = fnt_validateJWT_v001($jwt);
    if ($decoded_jwt === false) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(array("error" => "Invalid or expired token"));
        exit;
    }
    $acco_id = $decoded_jwt['acco_id'];
    $acco_email = $decoded_jwt['acco_email'];
}

mysqli_begin_transaction($DBLINK);

$hashed_new_password = hash('sha256', $new_password);

$qry_updatePassword = "
        UPDATE account
        SET acco_password = ?
        WHERE acco_id = ?
    ";
$stmt = mysqli_prepare($DBLINK, $qry_updatePassword);

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Error while updating password']);
    mysqli_rollback($DBLINK);
    exit;
}

mysqli_stmt_bind_param($stmt, 'si', $hashed_new_password, $acco_id);
if(!mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    http_response_code(500);
    mysqli_rollback($DBLINK);
    echo json_encode(['error' => 'Error while updating password']);
    exit;
}
mysqli_stmt_close($stmt);


if (!fnt_sendEmailForChangedPassword_v001($acco_email,$server_url)){
    http_response_code(500);
    echo json_encode(['error' => 'Error while sending mail']);
    mysqli_stmt_close($stmt);
    exit;
}


if (isset($_POST["recovery_token"])) {
    $recovery_token = $_POST["recovery_token"];
    if(!fnt_deleteRecoveryPasswordToken_v001($DBLINK,$recovery_token)){
        mysqli_rollback($DBLINK);
        http_response_code(500);
        echo json_encode(['error' => 'Error while deleting token']);
        exit;
    }
}

mysqli_query($DBLINK, 'COMMIT;');
echo json_encode(['valid' => 'password_updated']);
http_response_code(200);



