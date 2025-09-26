<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'The requested resource does not support HTTP method ' . $_SERVER['REQUEST_METHOD']]);
    exit;
}

if (!isset($_POST['acco_email'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Missing parameters']);
    exit;
}

require_once __DIR__ . "/../../../../config/cors.php";
require_once __DIR__ . "/../../../../functions/serverSpecifics.php";
require_once __DIR__ . "/../../../../utils/token/create.php";
require_once __DIR__ . "/../../../../utils/token/storage.php";
require_once __DIR__ . "/../../../../utils/mail/send.php";

$ProductionLibServerSpecifics = ServerSpecifics::getInstance();
$server_url = $ProductionLibServerSpecifics->fnt_getServerURL();
$DBLINK = $ProductionLibServerSpecifics->fnt_getDBConnection();
$acco_email = $_POST["acco_email"];


$qry_verifyToken = "SELECT * FROM pending_token WHERE acco_email = ? AND type = 'PASSWORD'";
$stmt_checkToken = mysqli_prepare($DBLINK, $qry_verifyToken);

mysqli_stmt_bind_param($stmt_checkToken, 's', $acco_email);
mysqli_stmt_execute($stmt_checkToken);
mysqli_stmt_store_result($stmt_checkToken);
if (mysqli_stmt_num_rows($stmt_checkToken) > 0) {
    http_response_code(409);
    echo json_encode(['error' => 'Token already made']);
    mysqli_stmt_close($stmt_checkToken);
    exit;
}

$token  = fnt_createEncryptedToken_v001($acco_email, 3600);
$encoded_token = urlencode($token);

if(!fnt_insertRecoveryPasswordToken_v001($DBLINK,$acco_email,$token,3600)){
    http_response_code(500);
    echo json_encode(['error' => 'Error while saving token']);
    mysqli_stmt_close($stmt_checkToken);
    exit;
}

if (!fnt_sendEmailForRecoveryPassword_v001($acco_email,$encoded_token,$server_url)){
    http_response_code(500);
    echo json_encode(['error' => 'Error while sending mail']);
    mysqli_stmt_close($stmt_checkToken);
    exit;
}

http_response_code(200);
echo json_encode(['valid' => ['recovery_token'=>$token]]);
mysqli_stmt_close($stmt_checkToken);
exit;
