<!-- /pages/reports_client_calls.php -->
<?php 
$activePage = "REPORTE_CLIENTES"; 
$pageTitle = "Llamadas Ejecutivos";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Reporte de Llamadas - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;">
        <?php require_once '../inc/inc_sidebar.php'; ?>
        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- Contact Calls Section -->
            <div id="contact-calls-section" class="section">
                <div class="section-header">
                    <h2 class="section-title">Llamadas de Ejecutivos a TSP's</h2>
                    <div>
                        <button class="btn btn-primary" id="export-contact-calls-btn">
                            <i class="fas fa-download"></i> Exportar CSV
                        </button>
                        <button class="btn" style="background: #dc2626; color: white;" id="export-contact-pdf-btn">
                            <i class="fas fa-file-pdf"></i> Exportar PDF
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <div class="filter-group">
                        <span class="filter-label">Fecha inicio:</span>
                        <input type="date" class="filter-input" value="2023-09-01" id="contact-date-from">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Fecha fin:</span>
                        <input type="date" class="filter-input" value="2023-09-15" id="contact-date-to">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Empresa:</span>
                        <select class="filter-select" id="contact-report-company">
                            <option>Todas las empresas</option>
                            <option>Banco Nacional</option>
                            <option>Centro Comercial Plaza</option>
                            <option>Hospital Central</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Ejecutivo:</span>
                        <select class="filter-select" id="contact-report-contact">
                            <option>Todos los ejecutivos</option>
                            <option>Director General</option>
                            <option>Supervisor Turno</option>
                            <option>Gerente Operaciones</option>
                            <option>Gerente Comercial</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Estado:</span>
                        <select class="filter-select" id="contact-report-status">
                            <option>Todos</option>
                            <option>Completadas</option>
                            <option>Fallidas</option>
                            <option>No contestadas</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="generate-contact-report-btn">
                        <i class="fas fa-filter"></i> Generar Reporte
                    </button>
                </div>

                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Buscar por ejecutivo, TSP o número..."
                        id="search-contact-report">
                    <button class="search-button" id="search-contact-report-btn">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Fecha/Hora</th>
                                <th>Empresa</th>
                                <th>Ejecutivo</th>
                                <th>TSP</th>
                                <th>No. Ejecutivo</th>
                                <th>No. Virtual TSP</th>
                                <th>Duración</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15/09/2023 09:15</td>
                                <td>Banco Nacional</td>
                                <td>Director General</td>
                                <td>Juan Perez (10323)</td>
                                <td>55*****545</td>
                                <td>5584284444</td>
                                <td>03:45</td>
                                <td><span class="badge badge-success">Completada</span></td>
                            </tr>
                            <tr>
                                <td>15/09/2023 10:30</td>
                                <td>Banco Nacional</td>
                                <td>Supervisor Turno</td>
                                <td>Maria Garcia (10324)</td>
                                <td>55*****890</td>
                                <td>5584284445</td>
                                <td>02:15</td>
                                <td><span class="badge badge-success">Completada</span></td>
                            </tr>
                            <tr>
                                <td>15/09/2023 11:45</td>
                                <td>Centro Comercial Plaza</td>
                                <td>Gerente Comercial</td>
                                <td>Ana Martinez (10326)</td>
                                <td>55*****111</td>
                                <td>5584284447</td>
                                <td>00:00</td>
                                <td><span class="badge badge-warning">No contestada</span></td>
                            </tr>
                            <tr>
                                <td>15/09/2023 14:20</td>
                                <td>Banco Nacional</td>
                                <td>Director General</td>
                                <td>Carlos Lopez (10325)</td>
                                <td>55*****545</td>
                                <td>5584284446</td>
                                <td>01:30</td>
                                <td><span class="badge badge-success">Completada</span></td>
                            </tr>
                            <tr>
                                <td>15/09/2023 16:05</td>
                                <td>Centro Comercial Plaza</td>
                                <td>Supervisor General</td>
                                <td>Roberto Gonzalez (10327)</td>
                                <td>55*****222</td>
                                <td>5584284448</td>
                                <td>00:00</td>
                                <td><span class="badge badge-danger">Fallida</span></td>
                            </tr>
                            <tr>
                                <td>14/09/2023 08:30</td>
                                <td>Banco Nacional</td>
                                <td>Gerente Operaciones</td>
                                <td>Juan Perez (10323)</td>
                                <td>55*****321</td>
                                <td>5584284444</td>
                                <td>04:20</td>
                                <td><span class="badge badge-success">Completada</span></td>
                            </tr>
                            <tr>
                                <td>14/09/2023 13:15</td>
                                <td>Banco Nacional</td>
                                <td>Supervisor Turno</td>
                                <td>Maria Garcia (10324)</td>
                                <td>55*****890</td>
                                <td>5584284445</td>
                                <td>00:45</td>
                                <td><span class="badge badge-success">Completada</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../inc/inc_modals.php'; ?>
    <?php require_once '../inc/inc_footer_scripts.php'; ?>
</body>

</html>