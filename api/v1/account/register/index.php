<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'The requested resource does not support HTTP method ' . $_SERVER['REQUEST_METHOD']]);
    exit;
}


if (!isset($_POST['acco_name']) || !isset($_POST['acco_email']) || !isset($_POST['acco_password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing parameters']);
    exit;
}


require_once __DIR__ . "/../../../../config/cors.php";
require_once __DIR__ . "/../../../../functions/serverSpecifics.php";
require_once __DIR__ . "/../../../../utils/token/create.php";

$ProductionLibServerSpecifics = ServerSpecifics::getInstance();
$DBLINK = $ProductionLibServerSpecifics->fnt_getDBConnection();
$acco_name = $_POST['acco_name'];
$acco_email = $_POST['acco_email'];
$acco_password = $_POST['acco_password'];
$acco_role = $_POST['acco_role'] ?? 'auditor';

$possible_roles = ['admin', 'auditor', 'system_admin'];
if (!in_array($acco_role, $possible_roles)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid role specified']);
    exit;
}

$qry_checkEmail = "SELECT * FROM account WHERE acco_email = ?";
$stmt_checkEmail = mysqli_prepare($DBLINK, $qry_checkEmail);

mysqli_stmt_bind_param($stmt_checkEmail, 's', $acco_email);
mysqli_stmt_execute($stmt_checkEmail);
mysqli_stmt_store_result($stmt_checkEmail);

if (mysqli_stmt_num_rows($stmt_checkEmail) > 0) {
    http_response_code(409);
    echo json_encode(['error' => 'Email already registered']);
    mysqli_stmt_close($stmt_checkEmail);
    exit;
}

mysqli_stmt_close($stmt_checkEmail);
$hashed_password = hash('sha256', $acco_password);
$qry_insertUser = "INSERT INTO account (acco_name, acco_email, acco_password, acco_status, acco_role) VALUES (?, ?, ?, 1, ?)";
$stmt_insertUser = mysqli_prepare($DBLINK, $qry_insertUser);

mysqli_stmt_bind_param($stmt_insertUser, 'ssss', $acco_name, $acco_email, $hashed_password, $acco_role);

if (mysqli_stmt_execute($stmt_insertUser)) {
    http_response_code(201);
    echo json_encode(['valid' => 'user_registered']);
} else {
    http_response_code(500);
    echo json_encode(['error' => mysqli_stmt_error($stmt_insertUser)]);
}

mysqli_stmt_close($stmt_insertUser);

