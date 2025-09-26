<?php
$activePage = "DASHBOARD";
$pageTitle = "Dashboard";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Dashboard - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;">
        <?php require_once '../inc/inc_sidebar.php'; ?>
        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- Dashboard Section -->
            <div id="dashboard-section" class="section active">
                <div class="dashboard-grid">
                    <div class="stat-card">
                        <div class="stat-icon bg-primary">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="stat-info">
                            <h3>248</h3>
                            <p>Llamadas Hoy</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="stat-info">
                            <h3>42</h3>
                            <p>TSP's Activos</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon bg-warning">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>128</h3>
                            <p>Ejecutivos Registrados</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon bg-danger">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="stat-info">
                            <h3>8</h3>
                            <p>Empresas Activas</p>
                        </div>
                    </div>
                </div>

                <div class="section-header">
                    <h2 class="section-title">Llamadas Recientes</h2>
                    <div>
                        <button class="btn btn-primary" id="export-calls-btn">
                            <i class="fas fa-download"></i> Exportar
                        </button>
                        <button class="btn" style="background: #7c3aed; color: white;" id="print-calls-btn">
                            <i class="fas fa-print"></i> Imprimir
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <!-- <div class="filter-group">
                        <span class="filter-label">Fecha:</span>
                        <input type="date" class="filter-input" id="date-from">
                        <span class="filter-label">a</span>
                        <input type="date" class="filter-input" id="date-to">
                    </div> -->
                    <div class="filter-group">
                        <span class="filter-label">Empresa:</span>
                        <select class="filter-select" id="company-filter">
                            <option>Todas las empresas</option>
                            <option>Banco Nacional</option>
                            <option>Centro Comercial Plaza</option>
                            <option>Hospital Central</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Estado:</span>
                        <select class="filter-select" id="status-filter">
                            <option>Todos</option>
                            <option>Completadas</option>
                            <option>Fallidas</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="filter-calls-btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>

                <div class="card-grid">
                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Juan Perez</div>
                            <span class="status status-active">Completada</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Ejecutivo: Director General</div>
                                    <div class="data-subtitle">Teléfono: 55*****545</div>
                                    <div class="data-subtitle">15/09/2023 14:32 • Duración: 05:12 min</div>
                                </div>
                                <div class="data-actions">
                                    <button class="btn-icon btn-edit"><i class="fas fa-info-circle"></i></button>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. virtual TSP: 5584284444</div>
                                    <div class="data-subtitle">Empresa: Banco Nacional</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">DID: 5547446900</div>
                                    <div class="data-subtitle">Número de acceso utilizado</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Maria Garcia</div>
                            <span class="status status-active">Completada</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Ejecutivo: Supervisor Turno</div>
                                    <div class="data-subtitle">Teléfono: 55*****890</div>
                                    <div class="data-subtitle">15/09/2023 14:15 • Duración: 02:45 min</div>
                                </div>
                                <div class="data-actions">
                                    <button class="btn-icon btn-edit"><i class="fas fa-info-circle"></i></button>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. virtual TSP: 5584284445</div>
                                    <div class="data-subtitle">Empresa: Banco Nacional</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">DID: 5547446900</div>
                                    <div class="data-subtitle">Número de acceso utilizado</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Carlos Lopez</div>
                            <span class="status status-inactive">Fallida</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Ejecutivo: Gerente Operaciones</div>
                                    <div class="data-subtitle">Teléfono: 55*****321</div>
                                    <div class="data-subtitle">15/09/2023 13:58 • Duración: 00:00 min</div>
                                </div>
                                <div class="data-actions">
                                    <button class="btn-icon btn-edit"><i class="fas fa-info-circle"></i></button>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">No. virtual TSP: 5584284446</div>
                                    <div class="data-subtitle">Empresa: Banco Nacional</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">DID: 5547446900</div>
                                    <div class="data-subtitle">Número de acceso utilizado</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php require_once '../inc/inc_modals.php'; ?>
    <?php require_once '../inc/inc_footer_scripts.php'; ?>

</body>

</html>