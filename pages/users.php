<!-- /pages/users.php -->
<?php
$activePage = "USUARIOS";
$pageTitle = "Usuarios";
// session_start();
// if (!isset($_SESSION["user_id"])) { header("Location: /index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Administración de Usuarios - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;">
        <?php require_once '../inc/inc_sidebar.php'; ?>

        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- Users Section -->
            <div id="users-section" class="section">
                <div class="section-header">
                    <h2 class="section-title">Administración de Usuarios y Permisos</h2>
                    <div>
                        <button class="btn btn-primary" id="add-user-btn">
                            <i class="fas fa-plus"></i> Nuevo Usuario
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <div class="filter-group">
                        <span class="filter-label">Buscar:</span>
                        <input type="text" class="filter-input" placeholder="Nombre o usuario" id="search-user">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Rol:</span>
                        <select class="filter-select" id="role-filter">
                            <option>Todos</option>
                            <option>Administrador Sistema</option>
                            <option>Administrador</option>
                            <option>Auditor</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="filter-users-btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>

                <div class="card-grid">
                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Roberto Mendoza</div>
                            <span class="status status-active">Activo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">admin.ips</div>
                                    <div class="data-subtitle">Administrador Sistema</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">roberto.mendoza@ips.com</div>
                                    <div class="data-subtitle">Acceso a todas las empresas</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Permisos</div>
                                    <div class="data-subtitle">
                                        <span class="permission-tag permission-write">Escritura y Lectura</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('usuario')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Laura González</div>
                            <span class="status status-active">Activo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">administrador.1</div>
                                    <div class="data-subtitle">Administrador</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">laura.gonzalez@ips.com</div>
                                    <div class="data-subtitle">Acceso a empresas específicas</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Permisos</div>
                                    <div class="data-subtitle">
                                        <span class="permission-tag permission-write">Escritura y Lectura</span>
                                        <span class="permission-tag permission-read">Banco Nacional</span>
                                        <span class="permission-tag permission-read">Centro Comercial Plaza</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('usuario')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Jorge Silva</div>
                            <span class="status status-inactive">Inactivo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">auditor.1</div>
                                    <div class="data-subtitle">Auditor</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">jorge.silva@ips.com</div>
                                    <div class="data-subtitle">Acceso a todas las empresas</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Permisos</div>
                                    <div class="data-subtitle">
                                        <span class="permission-tag permission-read">Solo Lectura</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('usuario')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require_once '../inc/inc_modals.php'; ?>
    <?php require_once '../inc/inc_footer_scripts.php'; ?>

    <script src="/js/users.js"></script>
</body>

</html>