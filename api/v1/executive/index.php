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


// ===================== GET =====================
if ($method === 'GET') {
    $id_exec   = $_GET['id_exec']   ?? null;
    $id_empre  = $_GET['id_empre']  ?? null;
    $op_consec = $_GET['op_consec'] ?? null;

    $sql    = "SELECT id_exec, puesto, mobile, pin, id_empre, op_consec FROM empresa_contacto";
    $where  = [];
    $params = [];
    $types  = '';

    if (!is_null($id_exec)) {
        $where[]  = "id_exec = ?";
        $params[] = $id_exec;
        $types   .= 's';
    }
    if (!is_null($id_empre)) {
        $where[]  = "id_empre = ?";
        $params[] = $id_empre;
        $types   .= 's';
    }
    if (!is_null($op_consec)) {
        $where[]  = "op_consec = ?";
        $params[] = $op_consec;
        $types   .= 'i';
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
    if (!isset($_POST['id_exec']) || !isset($_POST['mobile']) || !isset($_POST['pin']) || !isset($_POST['id_empre']) || !isset($_POST['op_consec'])) {
        http_response_code(400);
        echo json_encode(['error' => 'id_exec, mobile, pin, id_empre and op_consec are required']);
        exit;
    }

    $id_exec   = $_POST['id_exec'];
    $puesto    = $_POST['puesto'] ?? null;
    $mobile    = $_POST['mobile'];
    $pin       = $_POST['pin'];
    $id_empre  = $_POST['id_empre'];
    $op_consec = (int)$_POST['op_consec'];

    if (!preg_match('/^\d{10}$/', $mobile)) {
        http_response_code(400);
        echo json_encode(['error' => 'mobile must be 10 digits']);
        exit;
    }

    if (!preg_match('/^\d{4}$/', $pin)) {
        http_response_code(400);
        echo json_encode(['error' => 'pin must be 4 digits']);
        exit;
    }

    $sql  = "INSERT INTO empresa_contacto (id_exec, puesto, mobile, pin, id_empre, op_consec) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "sssssi", $id_exec, $puesto, $mobile, $pin, $id_empre, $op_consec);

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
    $id_exec   = PUT('id_exec');

    if (!$id_exec) {
        http_response_code(400);
        echo json_encode(['error' => 'id_exec is required']);
        exit;
    }   

    $id_empre  = PUT('id_empre');
    $op_consec = PUT('op_consec');
    $puesto = PUT('puesto');
    $mobile = PUT('mobile');
    $pin    = PUT('pin');

    if (!is_null($mobile) && !preg_match('/^\d{10}$/', $mobile)) {
        http_response_code(400);
        echo json_encode(['error' => 'mobile must be 10 digits']);
        exit;
    }

    if (!is_null($pin) && !preg_match('/^\d{4}$/', $pin)) {
        http_response_code(400);
        echo json_encode(['error' => 'pin must be 4 digits']);
        exit;
    }

    $q_check = "SELECT 1 FROM empresa_contacto WHERE id_exec = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $id_exec);
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

    if(!is_null($id_empre)) {
        $fields[] = "id_empre = ?";
        $params[] = $id_empre;
        $types   .= 's';
    }
    if(!is_null($op_consec)) {
      $fields[] = "op_consec = ?";
      $params[] = $op_consec;
      $types   .= 'i';
    }

    if (!is_null($puesto)) {
        $fields[] = "puesto = ?";
        $params[] = $puesto;
        $types   .= 's';
    }
    if (!is_null($mobile)) {
        $fields[] = "mobile = ?";
        $params[] = $mobile;
        $types   .= 's';
    }
    if (!is_null($pin)) {
        $fields[] = "pin = ?";
        $params[] = $pin;
        $types   .= 's';
    }

    if (empty($fields)) {
        http_response_code(200);
        echo json_encode(['valid' => ['message' => 'No changes']]);
        exit;
    }

    $sql = "UPDATE empresa_contacto SET " . implode(", ", $fields) . " WHERE id_exec = ?";
    $params[] = $id_exec;
    $types   .= 's';

    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, $types, ...$params);

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


// ===================== DELETE =====================
if ($method === 'DELETE') {
    $id_exec   = DELETE('id_exec');

    if (!$id_exec){
        http_response_code(400);
        echo json_encode(['error' => 'id_exec is required']);
        exit;
    }

    $q_check = "SELECT 1 FROM empresa_contacto WHERE id_exec = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $id_exec);
    mysqli_stmt_execute($stmt_check);
    $rs_check = mysqli_stmt_get_result($stmt_check);
    if (mysqli_num_rows($rs_check) === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'record not found']);
        mysqli_stmt_close($stmt_check);
        exit;
    }
    mysqli_stmt_close($stmt_check);

    $sql  = "DELETE FROM empresa_contacto WHERE id_exec = ?";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $id_exec);
    $ok = mysqli_stmt_execute($stmt);

    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}

