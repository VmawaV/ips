<?php
require_once __DIR__ . '/validate.php';
$headers = getallheaders();
if (!isset($headers['Authorization'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Missing token']);
    exit;
}

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
$acco_name = $decoded_jwt['acco_name'];
$acco_role = $decoded_jwt['acco_role'];
$acco_status = $decoded_jwt['acco_status'];
