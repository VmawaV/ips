<?php
require_once './validate.php';
$headers = getallheaders();
if (!isset($headers['Authorization'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Missing token','details'=>$headers]);
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
$user_id = $decoded_jwt['user_id'];
$user_email = $decoded_jwt['user_email'];
$user_name = $decoded_jwt['user_name'];
$user_type = $decoded_jwt['user_type'];
