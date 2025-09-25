<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$allowedMethods = ['GET', 'POST', 'PUT', 'DELETE'];

if (!in_array($method, $allowedMethods)) {
    http_response_code(405);
    echo json_encode(['error' => 'The requested resource does not support HTTP method ' . $method]);
    exit;
}

require_once __DIR__ . "/../../../config/cors.php";
require_once __DIR__ . "/../../../functions/serverSpecifics.php";
require_once __DIR__ . "/../../../utils/token/pre_validate.php";
require_once __DIR__ . "/../../../utils/input/input_parser.php";

$ProductionLibServerSpecifics = ServerSpecifics::getInstance();
$DBLINK = $ProductionLibServerSpecifics->fnt_getDBConnection();

switch ($method) {
    case 'GET':
        $did = $_GET['did_number'] ?? null;
        if ($did) {
            $stmt = $DBLINK->prepare("SELECT * FROM dids WHERE did_number = ?");
            $stmt->execute([$did]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $DBLINK->query("SELECT * FROM dids");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode(['data' => $result]);
        break;

    case 'POST':
        $did_number = $_POST['did_number'] ?? null;
        $id_asig = $_POST['id_asig'] ?? null;
        $tipo = $_POST['tipo'] ?? null;

        if (!$did_number) {
            http_response_code(400);
            echo json_encode(['error' => 'did_number is required']);
            exit;
        }

        $stmt = $DBLINK->prepare("INSERT INTO dids (did_number, id_asig, tipo) VALUES (?, ?, ?)");
        $ok = $stmt->execute([$did_number, $id_asig, $tipo]);
        echo json_encode(['success' => $ok]);
        break;

    case 'PUT':
        $did_number = PUT('did_number');
        $id_asig = PUT('id_asig');
        $tipo = PUT('tipo');

        if (!$did_number) {
            http_response_code(400);
            echo json_encode(['error' => 'did_number is required']);
            exit;
        }

        $stmt = $DBLINK->prepare("UPDATE dids SET id_asig = ?, tipo = ? WHERE did_number = ?");
        $ok = $stmt->execute([$id_asig, $tipo, $did_number]);
        echo json_encode(['success' => $ok]);
        break;

    case 'DELETE':
        $did_number = DELETE('did_number');
        if (!$did_number) {
            http_response_code(400);
            echo json_encode(['error' => 'did_number is required']);
            exit;
        }
        $stmt = $DBLINK->prepare("DELETE FROM dids WHERE did_number = ?");
        $ok = $stmt->execute([$did_number]);
        echo json_encode(['success' => $ok]);
        break;
}

