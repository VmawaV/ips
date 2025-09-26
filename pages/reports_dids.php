<!-- /pages/report_dids.php -->
<?php
$activePage = "REPORTE_DIDS";
$pageTitle = "DIDs asignados";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Reporte de DID's - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;">
        <?php require_once '../inc/inc_sidebar.php'; ?>
        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- DID's Section -->
            <div id="dids-section" class="section">
                <div class="section-header">
                    <h2 class="section-title">Reporte de DID's asignados</h2>
                    <div>
                        <button class="btn btn-primary" id="export-dids-btn">
                            <i class="fas fa-download"></i> Exportar
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <div class="filter-group">
                        <span class="filter-label">Buscar:</span>
                        <input type="text" class="filter-input" placeholder="Número DID" id="search-dids-report">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Tipo:</span>
                        <select class="filter-select" id="did-type-filter">
                            <option>Todos</option>
                            <option>DID Empresa</option>
                            <option>No. virtual TSP</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Empresa:</span>
                        <select class="filter-select" id="dids-company-filter">
                            <option>Todas las empresas</option>
                            <option>Banco Nacional</option>
                            <option>Centro Comercial Plaza</option>
                            <option>Hospital Central</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="filter-dids-report-btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>

                <div class="card-grid">
                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">5547446900</div>
                            <span class="badge badge-ivr">DID Empresa</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Empresa: Banco Nacional</div>
                                    <div class="data-subtitle">Función: Número de acceso al IVR</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Fecha de asignación: 10/09/2023</div>
                                    <div class="data-subtitle">Fecha de carga: 05/09/2023</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('DID')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">5547446901</div>
                            <span class="badge badge-ivr">DID Empresa</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Empresa: Centro Comercial Plaza</div>
                                    <div class="data-subtitle">Función: Número de acceso al IVR</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Fecha de asignación: 11/09/2023</div>
                                    <div class="data-subtitle">Fecha de carga: 05/09/2023</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('DID')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">5584284444</div>
                            <span class="badge badge-mask">No. virtual TSP</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Empresa: Banco Nacional</div>
                                    <div class="data-subtitle">Asignado a: Juan Perez</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">Fecha de asignación: 10/09/2023</div>
                                    <div class="data-subtitle">Fecha de carga: 05/09/2023</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('DID')"><i
                                    class="fas fa-trash"></i></button>
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