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
    $id_empresa   = $_GET['id_empresa']   ?? null;
    $nombre_emp   = $_GET['nombre_emp']   ?? null;
    $did_emp_asig = $_GET['did_emp_asig'] ?? null;

    $sql    = "SELECT * FROM empresas";
    $where  = [];
    $params = [];
    $types  = '';

    if (!is_null($id_empresa)) {
        $where[]  = "id_empresa = ?";
        $params[] = $id_empresa;
        $types   .= 's';
    }
    if (!is_null($nombre_emp)) {
        $where[]  = "nombre_emp = ?";
        $params[] = $nombre_emp;
        $types   .= 's';
    }
    if (!is_null($did_emp_asig)) {
        $where[]  = "did_emp_asig = ?";
        $params[] = $did_emp_asig;
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
    if (!isset($_POST['nombre_emp']) || !isset($_POST['id_empresa'])) {
        http_response_code(400);
        echo json_encode(['error' => 'id_empresa and nombre_emp is required']);
        exit;
    }
    
    $id_empresa  = $_POST['id_empresa'];
    $nombre_emp   = $_POST['nombre_emp'];
    $did_emp_asig = $_POST['did_emp_asig'] ?? null;

    if(strlen($id_empresa) < 1 || strlen($id_empresa) > 7) {
        http_response_code(400);
        echo json_encode(['error' => 'id_empresa must be at least 1 character and at most 7 characters']);
        exit;
    }

    if (strlen($nombre_emp) < 2 || strlen($nombre_emp) > 25) {
        http_response_code(400);
        echo json_encode(['error' => 'nombre_emp must be at least 2 characters and at most 25 characters']);
        exit;
    }
  

    if (!is_null($did_emp_asig) && !preg_match('/^\d{10}$/', $did_emp_asig)) {
        http_response_code(400);
        echo json_encode(['error' => 'did_emp_asig must be a 10-digit number']);
        exit;
    }

    $sql  = "INSERT INTO empresas (id_empresa, nombre_emp, did_emp_asig) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "sss", $id_empresa, $nombre_emp, $did_emp_asig);

    try {
      $ok = mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            http_response_code(409);
            echo json_encode(['error' => 'Conflixt: id_empresa already exists']);
            exit;
        }
        if ($e->getCode() == 1452) {
            http_response_code(400);
            echo json_encode(['error' => 'Bad Request: did_emp_asig does not exist']);
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
    $id_empresa = PUT('id_empresa');
    if (!$id_empresa) {
        http_response_code(400);
        echo json_encode(['error' => 'id_empresa is required']);
        exit;
    }

    $nombre_emp   = PUT('nombre_emp');
    $did_emp_asig = PUT('did_emp_asig');
    $new_id_empresa = PUT('new_id_empresa');


    if(strlen($id_empresa) < 1 || strlen($id_empresa) > 7) {
        http_response_code(400);
        echo json_encode(['error' => 'id_empresa must be at least 1 character and at most 7 characters']);
        exit;
    }

    if (strlen($nombre_emp) < 2 || strlen($nombre_emp) > 25) {
        http_response_code(400);
        echo json_encode(['error' => 'nombre_emp must be at least 2 characters and at most 25 characters']);
        exit;
    }

    if (!is_null($did_emp_asig) && !preg_match('/^\d{10}$/', $did_emp_asig)) {
        http_response_code(400);
        echo json_encode(['error' => 'did_emp_asig must be a 10-digit number']);
        exit;
    }

    if (!is_null($new_id_empresa) && (strlen($new_id_empresa) < 1 || strlen($new_id_empresa) > 7)) {
        http_response_code(400);
        echo json_encode(['error' => 'new_id_empresa must be at least 1 character and at most 7 characters']);
        exit;
    } 

    $q_check = "SELECT 1 FROM empresas WHERE id_empresa = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $id_empresa);
    mysqli_stmt_execute($stmt_check);
    $rs_check = mysqli_stmt_get_result($stmt_check);
    if (mysqli_num_rows($rs_check) === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'id_empresa not found']);
        mysqli_stmt_close($stmt_check);
        exit;
    }
    mysqli_stmt_close($stmt_check);

    $fields = [];
    $params = [];
    $types  = '';

    if (!is_null($nombre_emp)) {
        $fields[] = "nombre_emp = ?";
        $params[] = $nombre_emp;
        $types   .= 's';
    }
    if (!is_null($did_emp_asig)) {
        $fields[] = "did_emp_asig = ?";
        $params[] = $did_emp_asig;
        $types   .= 's';
    }

    if (!is_null($new_id_empresa)) {
        $fields[] = "id_empresa = ?";
        $params[] = $new_id_empresa;
        $types   .= 's';
    }

    if (empty($fields)) {
        http_response_code(200);
        echo json_encode(['valid' => ['message' => 'No changes']]);
        exit;
    }

    $sql = "UPDATE empresas SET " . implode(", ", $fields) . " WHERE id_empresa = ?";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    $types  .= 's';
    $params[] = $id_empresa;

    mysqli_stmt_bind_param($stmt, $types, ...$params);
    try {
      $ok = mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            http_response_code(409);
            echo json_encode(['error' => 'Conflict: new_id_empresa already exists']);
            exit;
        }
        if ($e->getCode() == 1452) {
            http_response_code(400);
            echo json_encode(['error' => 'Bad Request: did_emp_asig does not exist']);
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
    $id_empresa = DELETE('id_empresa');
    if (!$id_empresa) {
        http_response_code(400);
        echo json_encode(['error' => 'id_empresa is required']);
        exit;
    }

    $q_check = "SELECT 1 FROM empresas WHERE id_empresa = ?";
    $stmt_check = mysqli_prepare($DBLINK, $q_check);
    if (!$stmt_check) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }
    mysqli_stmt_bind_param($stmt_check, "s", $id_empresa);
    mysqli_stmt_execute($stmt_check);
    $rs_check = mysqli_stmt_get_result($stmt_check);
    if (mysqli_num_rows($rs_check) === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'id_empresa not found']);
        mysqli_stmt_close($stmt_check);
        exit;
    }
    mysqli_stmt_close($stmt_check);

    $sql  = "DELETE FROM empresas WHERE id_empresa = ?";
    $stmt = mysqli_prepare($DBLINK, $sql);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(['error' => 'Database query preparation failed']);
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $id_empresa);
    $ok = mysqli_stmt_execute($stmt);

    echo json_encode(['success' => $ok]);
    mysqli_stmt_close($stmt);
    exit;
}

