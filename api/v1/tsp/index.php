<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
header('Content-Type: application/json');

require_once __DIR__ . "/../../../config/cors.php";
require_once __DIR__ . "/../../../functions/serverSpecifics.php";
require_once __DIR__ . "/../../../utils/token/pre_validate.php";
require_once __DIR__ . "/../../../utils/input/input_parser.php";

$method = $_SERVER['REQUEST_METHOD'];

// Validación de método
if (!in_array($method, ['GET','POST','PUT','DELETE'], true)) {
    http_response_code(405);
    echo json_encode(['error' => 'The requested resource does not support HTTP method ' . $method]);
    exit;
}

$ProductionLibServerSpecifics = ServerSpecifics::getInstance();
$DBLINK = $ProductionLibServerSpecifics->fnt_getDBConnection();


// ===================== GET =====================
if ($method === 'GET') {
    $id_tsp = $_GET['id_tsp'] ?? null;
    $id_empresa = $_GET['id_empresa'] ?? null;

    $sql    = "SELECT id_tsp, nombre, number, pin, id_empresa, did_asignado, estatus_tsp, obs FROM tsp";
    $where  = [];
    $params = [];
    $types  = '';

    if (!is_null($id_tsp)) {
        $where[]  = "id_tsp = ?";
        $params[] = $id_tsp;
        $types   .= 's';
    }
    if (!is_null($id_empresa)) {
        $where[]  = "id_empresa = ?";
        $params[] = $id_empresa;
        $types   .= 's';
    }

    if ($where) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }

    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    if ($params) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $rs = mysqli_stmt_get_result($stmt);

    $rows = [];
    while ($row = mysqli_fetch_assoc($rs)) {
        $rows[] = $row;
    }

    echo json_encode(['data' => $rows]);
    mysqli_stmt_close($stmt);
    exit;
}


// ===================== POST =====================
if ($method === 'POST') {
    if (!isset($_POST['id_tsp']) || !isset($_POST['nombre']) || !isset($_POST['number']) ||
        !isset($_POST['pin']) || !isset($_POST['id_empresa']) || !isset($_POST['did_asignado'])) {
        http_response_code(400);
        echo json_encode(['error' => 'id_tsp, nombre, number, pin, id_empresa, did_asignado are required']);
        exit;
    }

    $id_tsp      = $_POST['id_tsp'];
    $nombre      = $_POST['nombre'];
    $number      = $_POST['number'];
    $pin         = $_POST['pin'];
    $id_empresa  = $_POST['id_empresa'];
    $did_asignado= $_POST['did_asignado'];
    $estatus_tsp = $_POST['estatus_tsp'] ?? 1;
    $obs         = $_POST['obs'] ?? null;

    if (!preg_match('/^\d{10}$/', $number)) {
        http_response_code(400);
        echo json_encode(['error' => 'number must be 10 digits']);
        exit;
    }

    if (!preg_match('/^\d{10}$/', $did_asignado)) {
        http_response_code(400);
        echo json_encode(['error' => 'did_asignado must be 10 digits']);
        exit;
    }

    if (!preg_match('/^\d{4}$/', $pin)) {
        http_response_code(400);
        echo json_encode(['error' => 'pin must be 4 digits']);
        exit;
    }

    if (!in_array((int)$estatus_tsp, [0,1], true)) {
        http_response_code(400);
        echo json_encode(['error' => 'estatus_tsp must be 0 or 1']);
        exit;
    }


    $sql  = "INSERT INTO tsp (id_tsp, nombre, number, pin, id_empresa, did_asignado, estatus_tsp, obs) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "ssssssis",
        $id_tsp, $nombre, $number, $pin, $id_empresa, $did_asignado, $estatus_tsp, $obs
    );

    try {
        $ok = mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            http_response_code(409);
            echo json_encode(['error' => 'Conflict: record already exists']);
            exit;
        }
        throw $e;
    }

    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}


// ===================== PUT =====================
if ($method === 'PUT') {
    $id_tsp = PUT('id_tsp');
    if (!$id_tsp) {
        http_response_code(400);
        echo json_encode(['error' => 'id_tsp is required']);
        exit;
    }

    $nombre      = PUT('nombre');
    $number      = PUT('number');
    $pin         = PUT('pin');
    $id_empresa  = PUT('id_empresa');
    $did_asignado= PUT('did_asignado');
    $estatus_tsp = PUT('estatus_tsp');
    $obs         = PUT('obs');

    if (!is_null($number) && !preg_match('/^\d{10}$/', $number)) {
        http_response_code(400);
        echo json_encode(['error' => 'number must be 10 digits']);
        exit;
    }

    if (!is_null($pin) && !preg_match('/^\d{4}$/', $pin)) {
        http_response_code(400);
        echo json_encode(['error' => 'pin must be 4 digits']);
        exit;
    }

    if (!is_null($estatus_tsp) && !in_array((int)$estatus_tsp, [0,1], true)) {
        http_response_code(400);
        echo json_encode(['error' => 'estatus_tsp must be 0 or 1']);
        exit;
    }

    $q_check = "SELECT 1 FROM tsp WHERE id_tsp = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $id_tsp);
    mysqli_stmt_execute($stmt_check);
    $rs_check = mysqli_stmt_get_result($stmt_check);
    if (mysqli_num_rows($rs_check) === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'record not found']);
        mysqli_stmt_close($stmt_check);
        exit;
    }
    mysqli_stmt_close($stmt_check);

    $fields = [];
    $params = [];
    $types  = '';

    if (!is_null($nombre)) {
        $fields[] = "nombre = ?";
        $params[] = $nombre;
        $types   .= 's';
    }
    if (!is_null($number)) {
        $fields[] = "number = ?";
        $params[] = $number;
        $types   .= 's';
    }
    if (!is_null($pin)) {
        $fields[] = "pin = ?";
        $params[] = $pin;
        $types   .= 's';
    }
    if (!is_null($id_empresa)) {
        $fields[] = "id_empresa = ?";
        $params[] = $id_empresa;
        $types   .= 's';
    }
    if (!is_null($did_asignado)) {
        $fields[] = "did_asignado = ?";
        $params[] = $did_asignado;
        $types   .= 's';
    }
    if (!is_null($estatus_tsp)) {
        $fields[] = "estatus_tsp = ?";
        $params[] = $estatus_tsp;
        $types   .= 'i';
    }
    if (!is_null($obs)) {
        $fields[] = "obs = ?";
        $params[] = $obs;
        $types   .= 's';
    }

    if (empty($fields)) {
        http_response_code(200);
        echo json_encode(['valid' => ['message' => 'No changes']]);
        exit;
    }

    $sql = "UPDATE tsp SET " . implode(", ", $fields) . " WHERE id_tsp = ?";
    $params[] = $id_tsp;
    $types   .= 's';

    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, $types, ...$params);

    $ok = mysqli_stmt_execute($stmt);

    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}


// ===================== DELETE =====================
if ($method === 'DELETE') {
    $id_tsp = DELETE('id_tsp');
    if (!$id_tsp) {
        http_response_code(400);
        echo json_encode(['error' => 'id_tsp is required']);
        exit;
    }

    $q_check = "SELECT 1 FROM tsp WHERE id_tsp = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $id_tsp);
    mysqli_stmt_execute($stmt_check);
    $rs_check = mysqli_stmt_get_result($stmt_check);
    if (mysqli_num_rows($rs_check) === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'record not found']);
        mysqli_stmt_close($stmt_check);
        exit;
    }
    mysqli_stmt_close($stmt_check);

    $sql  = "DELETE FROM tsp WHERE id_tsp = ?";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $id_tsp);
    $ok = mysqli_stmt_execute($stmt);

    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}

