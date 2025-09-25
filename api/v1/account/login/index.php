<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'The requested resource does not support HTTP method ' . $_SERVER['REQUEST_METHOD']]);
    exit;
}

if (!isset($_POST['acco_email']) || !isset($_POST['acco_password'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Missing parameters','data'=>$_POST]);
    exit;
}
require_once __DIR__ . "/../../../../config/cors.php";
require_once __DIR__ . "/../../../../functions/serverSpecifics.php";
require_once __DIR__ . "/../../../../utils/token/create.php";
$ProductionLibServerSpecifics = ServerSpecifics::getInstance();
$DBLINK = $ProductionLibServerSpecifics->fnt_getDBConnection();
$acco_email = $_POST["acco_email"];
$user_password = $_POST["acco_password"];


$qry_getInformationUser = "
    SELECT * FROM account
    WHERE acco_email = ?
";

$stmt = mysqli_prepare($DBLINK, $qry_getInformationUser);
if (!$stmt) {
    http_response_code(401);
    echo json_encode(['error' => 'Database query preparation failed']);
    exit;
}

mysqli_stmt_bind_param($stmt, "s", $acco_email);
mysqli_stmt_execute($stmt);
$rs_getInformationUser = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($rs_getInformationUser) === 0) {
    http_response_code(401);
    echo json_encode(['error' => 'User not found']);
    mysqli_stmt_close($stmt);
    exit;
}

$row_getInformationUser = mysqli_fetch_array($rs_getInformationUser);
$hashed_input_password = hash('sha256', $user_password);

if ($hashed_input_password !== $row_getInformationUser['acco_password']) {
    http_response_code(401);
    echo json_encode(['error' => 'User not found']);
    mysqli_stmt_close($stmt);
    exit;
}

$acco_id = $row_getInformationUser['acco_id'];
$acco_name = $row_getInformationUser['acco_name'];
$acco_email = $row_getInformationUser['acco_email'];
$acco_role = $row_getInformationUser["acco_role"];
$acco_status = $row_getInformationUser["acco_status"];
mysqli_stmt_close($stmt);

$jwt = fnt_createJWT_v001($acco_id,$acco_name,$acco_email,$acco_role,$acco_status);

echo json_encode(['valid' =>['jwt'=>$jwt]]);
http_response_code(200);
exit;
