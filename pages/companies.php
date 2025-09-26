<!-- /pages/companies.php -->
<?php
$activePage = "EMPRESAS";
$pageTitle = "Empresas";
// session_start();
// if (!isset($_SESSION["user_id"])) { header("Location: /index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Administración de Empresas - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;">
        <?php require_once '../inc/inc_sidebar.php'; ?>

        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- Companies Section -->
            <div id="companies-section" class="section">
                <div class="section-header">
                    <h2 class="section-title">Gestión de Empresas</h2>
                    <div>
                        <button class="btn" style="background: #7c3aed; color: white;" id="import-companies-btn">
                            <i class="fas fa-file-import"></i> Importar
                        </button>
                        <button class="btn btn-primary" id="add-company-btn">
                            <i class="fas fa-plus"></i> Nueva Empresa
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <div class="filter-group">
                        <span class="filter-label">Buscar:</span>
                        <input type="text" class="filter-input" placeholder="Nombre o ID de empresa"
                            id="search-company">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Estado:</span>
                        <select class="filter-select" id="company-status-filter">
                            <option>Todas</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="filter-companies-btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>

                <div class="card-grid">
                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Banco Nacional</div>
                            <span class="status status-active">Activo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">ID: EMP001</div>
                                    <div class="data-subtitle">Contratación: 15/03/2023</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">DID: 5547446900</div>
                                    <div class="data-subtitle">Número para acceso al IVR</div>
                                </div>
                                <div class="data-actions">
                                    <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                                </div>
                            </div>

                            <!-- Linked TSPs Section -->
                            <div class="linked-clients">
                                <div class="clients-header" onclick="toggleClients(this)">
                                    <div>
                                        <span class="tsps-title">TSP's asignados</span>
                                        <span class="tsps-count">3</span>
                                    </div>
                                    <i class="fas fa-chevron-down"></i>
                                </div>

                                <div class="clients-list">
                                    <div class="client-item">
                                        <div class="tsps-avatar">JP</div>
                                        <div class="client-info">
                                            <div class="client-name">Juan Perez</div>
                                            <div class="client-id">ID: 10323</div>
                                            <div class="client-phone">No. virtual: 5584284444</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>

                                    <div class="client-item">
                                        <div class="tsps-avatar">MG</div>
                                        <div class="client-info">
                                            <div class="client-name">Maria Garcia</div>
                                            <div class="client-id">ID: 10324</div>
                                            <div class="client-phone">No. virtual: 5584284445</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>

                                    <div class="client-item">
                                        <div class="tsps-avatar">CL</div>
                                        <div class="client-info">
                                            <div class="client-name">Carlos Lopez</div>
                                            <div class="client-id">ID: 10325</div>
                                            <div class="client-phone">No. virtual: 5584284446</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Linked Clients Section -->
                            <div class="linked-clients">
                                <div class="clients-header" onclick="toggleClients(this)">
                                    <div>
                                        <span class="clients-title">Ejecutivos asignados</span>
                                        <span class="clients-count">5</span>
                                    </div>
                                    <i class="fas fa-chevron-down"></i>
                                </div>

                                <div class="clients-list">
                                    <div class="client-item">
                                        <div class="client-avatar">DG</div>
                                        <div class="client-info">
                                            <div class="client-name">Director General</div>
                                            <div class="client-phone">55*****545</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>

                                    <div class="client-item">
                                        <div class="client-avatar">ST</div>
                                        <div class="client-info">
                                            <div class="client-name">Supervisor Turno</div>
                                            <div class="client-phone">55*****890</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('empresa')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Centro Comercial Plaza</div>
                            <span class="status status-active">Activo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">ID: EMP002</div>
                                    <div class="data-subtitle">Contratación: 22/05/2023</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">DID: 5547446901</div>
                                    <div class="data-subtitle">Número para acceso al IVR</div>
                                </div>
                                <div class="data-actions">
                                    <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                                </div>
                            </div>

                            <!-- Linked TSPs Section -->
                            <div class="linked-clients">
                                <div class="clients-header" onclick="toggleClients(this)">
                                    <div>
                                        <span class="tsps-title">TSP's asignados</span>
                                        <span class="tsps-count">2</span>
                                    </div>
                                    <i class="fas fa-chevron-down"></i>
                                </div>

                                <div class="clients-list">
                                    <div class="client-item">
                                        <div class="tsps-avatar">AM</div>
                                        <div class="client-info">
                                            <div class="client-name">Ana Martinez</div>
                                            <div class="client-id">ID: 10326</div>
                                            <div class="client-phone">No. virtual: 5584284447</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>

                                    <div class="client-item">
                                        <div class="tsps-avatar">RG</div>
                                        <div class="client-info">
                                            <div class="client-name">Roberto Gonzalez</div>
                                            <div class="client-id">ID: 10327</div>
                                            <div class="client-phone">No. virtual: 5584284448</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Linked Clients Section -->
                            <div class="linked-clients">
                                <div class="clients-header" onclick="toggleClients(this)">
                                    <div>
                                        <span class="clients-title">Ejecutivos asignados</span>
                                        <span class="clients-count">3</span>
                                    </div>
                                    <i class="fas fa-chevron-down"></i>
                                </div>

                                <div class="clients-list">
                                    <div class="client-item">
                                        <div class="client-avatar">GC</div>
                                        <div class="client-info">
                                            <div class="client-name">Gerente Comercial</div>
                                            <div class="client-phone">55*****111</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>

                                    <div class="client-item">
                                        <div class="client-avatar">SG</div>
                                        <div class="client-info">
                                            <div class="client-name">Supervisor General</div>
                                            <div class="client-phone">55*****222</div>
                                        </div>
                                        <span class="status status-active">Activo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('empresa')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <div class="data-card">
                        <div class="card-header">
                            <div class="card-title">Hospital Central</div>
                            <span class="status status-inactive">Inactivo</span>
                        </div>
                        <div class="card-body">
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">ID: EMP003</div>
                                    <div class="data-subtitle">Contratación: 10/01/2023</div>
                                </div>
                            </div>
                            <div class="data-item">
                                <div class="data-content">
                                    <div class="data-title">DID: No asignado</div>
                                    <div class="data-subtitle">Se requiere configurar DID</div>
                                </div>
                                <div class="data-actions">
                                    <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                                </div>
                            </div>

                            <!-- Linked TSPs Section -->
                            <div class="linked-clients">
                                <div class="clients-header" onclick="toggleClients(this)">
                                    <div>
                                        <span class="tsps-title">TSP's asignados</span>
                                        <span class="tsps-count">0</span>
                                    </div>
                                    <i class="fas fa-chevron-down"></i>
                                </div>

                                <div class="clients-list">
                                    <div class="empty-state">
                                        <i class="fas fa-user-shield"></i>
                                        <p>No hay TSP's asignados</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Linked Clients Section -->
                            <div class="linked-clients">
                                <div class="clients-header" onclick="toggleClients(this)">
                                    <div>
                                        <span class="clients-title">Ejecutivos asignados</span>
                                        <span class="clients-count">0</span>
                                    </div>
                                    <i class="fas fa-chevron-down"></i>
                                </div>

                                <div class="clients-list">
                                    <div class="empty-state">
                                        <i class="fas fa-users"></i>
                                        <p>No hay Ejecutivos asignados</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="confirmDelete('empresa')"><i
                                    class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require_once '../inc/inc_modals.php'; ?>
    <?php require_once '../inc/inc_footer_scripts.php'; ?>

    <script src="/js/companies.js"></script>
</body>

</html>