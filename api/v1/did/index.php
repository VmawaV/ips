<?php
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
$possible_types = ['tsp', 'empresa'];


// ===================== GET =====================
if ($method === 'GET') {
    $did_number = $_GET['did_number'] ?? null;
    $id_asig    = $_GET['id_asig'] ?? null;
    $type       = $_GET['type'] ?? null;

    $sql    = "SELECT * FROM dids";
    $where  = [];
    $params = [];
    $types  = '';

    if (!is_null($did_number)) {
        $where[]  = "did_number = ?";
        $params[] = $did_number;
        $types   .= 's';
    }
    if (!is_null($id_asig)) {
        $where[]  = "id_asig = ?";
        $params[] = $id_asig;
        $types   .= 's';
    }
    if (!is_null($type)) {
        $where[]  = "tipo = ?";
        $params[] = $type;
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
    if (!isset($_POST['did_number']) || !isset($_POST['type'])) {
        http_response_code(400);
        echo json_encode(['error' => 'did_number and type is required']);
        exit;
    }
    
    $did_number = $_POST['did_number'];
    $type       = $_POST['type'];
    $id_asig    = $_POST['id_asig'] ?? null;

    if (!preg_match('/^\d{10}$/', $did_number)) {
        http_response_code(400);
        echo json_encode(['error' => 'did_number must be exactly 10 digits']);
        exit;
    }

    if (!in_array($type, $possible_types, true)) {
        http_response_code(400);
        echo json_encode(['error' => 'type must be one of: ' . implode(", ", $possible_types)]);
        exit;
    }

    $sql  = "INSERT INTO dids (did_number, id_asig, tipo) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "sss", $did_number, $id_asig, $type);

    try {
      $ok = mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            http_response_code(409);
            echo json_encode(['error' => 'Conflict: did_number already exists']);
            exit;
        }
        http_response_code(500);
        echo json_encode(['error' => 'Bad Request']);
        exit;
    }
    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}


// ===================== PUT =====================
if ($method === 'PUT') {
  $did_number = PUT('did_number');
    if (!$did_number) {
        http_response_code(400);
        echo json_encode(['error' => 'did_number is required']);
        exit;
    }


    $id_asig = PUT('id_asig');
    $type    = PUT('type');
    $new_did_number = PUT('new_did_number');


    if (!preg_match('/^\d{10}$/', $did_number)) {
        http_response_code(400);
        echo json_encode(['error' => 'did_number must be exactly 10 digits']);
        exit;
    }

    if (!is_null($new_did_number) && !preg_match('/^\d{10}$/', $new_did_number)) {
        http_response_code(400);
        echo json_encode(['error' => 'new_did_number must be exactly 10 digits']);
        exit;
    }

    if (!is_null($type) && !in_array($type, $possible_types, true)) {
        http_response_code(400);
        echo json_encode(['error' => 'type must be one of: ' . implode(", ", $possible_types)]);
        exit;
    }

    $q_check = "SELECT 1 FROM dids WHERE did_number = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
      http_response_code(500);
      echo json_encode(['error' => 'Database query preparation failed']);
      exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $did_number);
    mysqli_stmt_execute($stmt_check);
    $rs_check = mysqli_stmt_get_result($stmt_check);
    if (mysqli_num_rows($rs_check) === 0) {
      http_response_code(404);
      echo json_encode(['error' => 'did_number not found']);
      mysqli_stmt_close($stmt_check);
      exit;
    }

    $fields = [];
    $params = [];
    $types  = '';

    if (!is_null($new_did_number)) {
        $fields[] = "did_number = ?";
        $params[] = $new_did_number;
        $types   .= 's';
    }

    if (!is_null($id_asig)) {
        $fields[] = "id_asig = ?";
        $params[] = $id_asig;
        $types   .= 's';
    }
    if (!is_null($type)) {
        $fields[] = "tipo = ?";
        $params[] = $type;
        $types   .= 's';
    }

    if (empty($fields)) {
        http_response_code(200);
        echo json_encode(['valid' => ['message' => 'No changes']]);
        exit;
    }

    $sql = "UPDATE dids SET " . implode(", ", $fields) . " WHERE did_number = ?";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    $types  .= 's';
    $params[] = $did_number;

    mysqli_stmt_bind_param($stmt, $types, ...$params);

    try {
      $ok = mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            http_response_code(409);
            echo json_encode(['error' => 'Conflict: did_number already exists']);
            exit;
        }
        http_response_code(500);
        echo json_encode(['error' => 'Bad Request']);
        exit;
    }
    
    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}


// ===================== DELETE =====================
if ($method === 'DELETE') {
    $did_number = DELETE('did_number');
    if (!$did_number) {
        http_response_code(400);
        echo json_encode(['error' => 'did_number is required']);
        exit;
    }

    if (!preg_match('/^\d{10}$/', $did_number)) {
        http_response_code(400);
        echo json_encode(['error' => 'did_number must be exactly 10 digits']);
        exit;
    }

    $q_check = "SELECT 1 FROM dids WHERE did_number = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
      http_response_code(500);
      echo json_encode(['error' => 'Database query preparation failed']);
      exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $did_number);
    mysqli_stmt_execute($stmt_check);
    $rs_check = mysqli_stmt_get_result($stmt_check);
    if (mysqli_num_rows($rs_check) === 0) {
      http_response_code(404);
      echo json_encode(['error' => 'did_number not found']);
      mysqli_stmt_close($stmt_check);
      exit;
    }
    mysqli_stmt_close($stmt_check);

    $sql  = "DELETE FROM dids WHERE did_number = ?";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $did_number);
    $ok = mysqli_stmt_execute($stmt);

    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}

