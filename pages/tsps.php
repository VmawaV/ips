<!-- /pages/tsps.php -->
<?php
$activePage = "TSPS";
$pageTitle = "TSP's";
// session_start();
// if (!isset($_SESSION["user_id"])) { header("Location: /index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Administración de TSP's - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;"> 
        <?php require_once '../inc/inc_sidebar.php'; ?>

        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- TSP's Section -->
            <div id="tsps-section" class="section">
                <div class="section-header">
                    <h2 class="section-title">Gestión de TSP's</h2>
                    <div>
                        <button class="btn" style="background: #7c3aed; color: white;" id="import-tsps-btn">
                            <i class="fas fa-file-import"></i> Importar
                        </button>
                        <button class="btn btn-primary" id="add-tsp-btn">
                            <i class="fas fa-plus"></i> Nuevo TSP
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <div class="filter-group">
                        <span class="filter-label">Buscar:</span>
                        <input type="text" class="filter-input" placeholder="Nombre o ID de TSP" id="search-tsp">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Empresa:</span>
                        <select class="filter-select" id="tsp-company-filter">
                            <option>Todas las empresas</option>
                            <option>Banco Nacional</option>
                            <option>Centro Comercial Plaza</option>
                            <option>Hospital Central</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Estado:</span>
                        <select class="filter-select" id="tsp-status-filter">
                            <option>Todos</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="filter-tsps-btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>

                <div class="card-grid">
                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Juan Perez</div>
                            <span class="status status-active">Activo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">ID: 10323</div>
                                    <div class="data-subtitle">Empresa: Banco Nacional</div>
                                    <div class="data-subtitle">Observaciones: Guardia Estacionamiento</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. móvil: 5511223344</div>
                                    <div class="data-subtitle">PIN: 10345</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. virtual: 5584284444</div>
                                </div>
                            </div>

                            <!-- IVR Instruction -->
                            <div class="ivr-instruction">
                                <div class="data-content">
                                    <div class="data-title"><i class="fas fa-info-circle"></i> Instrucción para el
                                        TSP</div>
                                    <div class="data-subtitle">Debe marcar al: <span
                                            class="ivr-number">5547446900</span> y luego ingresar
                                        su PIN</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('TSP')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Maria Garcia</div>
                            <span class="status status-active">Activo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">ID: 10324</div>
                                    <div class="data-subtitle">Empresa: Banco Nacional</div>
                                    <div class="data-subtitle">Observaciones: Supervisor de Turno</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. móvil: 5511223345</div>
                                    <div class="data-subtitle">PIN: 10346</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. virtual: 5584284445</div>
                                </div>
                            </div>

                            <!-- IVR Instruction -->
                            <div class="ivr-instruction">
                                <div class="data-content">
                                    <div class="data-title"><i class="fas fa-info-circle"></i> Instrucción para el
                                        TSP</div>
                                    <div class="data-subtitle">Debe marcar al: <span
                                            class="ivr-number">5547446900</span> y luego ingresar
                                        su PIN</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('TSP')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Ana Martinez</div>
                            <span class="status status-active">Activo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">ID: 10326</div>
                                    <div class="data-subtitle">Empresa: Centro Comercial Plaza</div>
                                    <div class="data-subtitle">Observaciones: Guardia Principal</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. móvil: 5511223347</div>
                                    <div class="data-subtitle">PIN: 10348</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. virtual: 5584284447</div>
                                </div>
                            </div>

                            <!-- IVR Instruction -->
                            <div class="ivr-instruction">
                                <div class="data-content">
                                    <div class="data-title"><i class="fas fa-info-circle"></i> Instrucción para el
                                        TSP</div>
                                    <div class="data-subtitle">Debe marcar al: <span
                                            class="ivr-number">5547446901</span> y luego ingresar
                                        su PIN</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('TSP')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once '../inc/inc_modals.php'; ?>
    <?php require_once '../inc/inc_footer_scripts.php'; ?>

    <script src="/js/tsps.js"></script>
</body>

</html>