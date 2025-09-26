<!-- /pages/report_tsp_calls.php -->
<?php 
$activePage = "REPORTE_TSPS"; 
$pageTitle = "Llamadas TSP";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Reporte de Llamadas TSP - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;">
        <?php require_once '../inc/inc_sidebar.php'; ?>
        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- TSP Calls Section -->
            <div id="reports-section" class="section">
                <div class="section-header">
                    <h2 class="section-title">Llamadas de TSP's a Ejecutivos</h2>
                    <div>
                        <button class="btn btn-primary" id="export-tsp-calls-btn">
                            <i class="fas fa-download"></i> Exportar CSV
                        </button>
                        <button class="btn" style="background: #dc2626; color: white;" id="export-tsp-pdf-btn">
                            <i class="fas fa-file-pdf"></i> Exportar PDF
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <div class="filter-group">
                        <span class="filter-label">Fecha inicio:</span>
                        <input type="date" class="filter-input" value="2023-09-01" id="tsp-date-from">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Fecha fin:</span>
                        <input type="date" class="filter-input" value="2023-09-15" id="tsp-date-to">
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Empresa:</span>
                        <select class="filter-select" id="tsp-report-company">
                            <option>Todas las empresas</option>
                            <option>Banco Nacional</option>
                            <option>Centro Comercial Plaza</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">TSP:</span>
                        <select class="filter-select" id="tsp-report-tsp">
                            <option>Todos</option>
                            <option>Juan Perez (10323)</option>
                            <option>Maria Garcia (10324)</option>
                            <option>Carlos Lopez (10325)</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <span class="filter-label">Estado:</span>
                        <select class="filter-select" id="tsp-report-status">
                            <option>Todos</option>
                            <option>Completadas</option>
                            <option>Fallidas</option>
                            <option>No contestadas</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="generate-tsp-report-btn">
                        <i class="fas fa-filter"></i> Generar Reporte
                    </button>
                </div>

                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Buscar en reportes..." id="search-tsp-report">
                    <button class="search-button" id="search-tsp-report-btn">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Fecha/Hora</th>
                                <th>Empresa</th>
                                <th>TSP</th>
                                <th>No. Ejecutivo</th>
                                <th>Duración</th>
                                <th>Estado</th>
                                <th>DID Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15/09/2023 14:32</td>
                                <td>Banco Nacional</td>
                                <td>Juan Perez (10323)</td>
                                <td>5566774545</td>
                                <td>05:12</td>
                                <td><span class="badge badge-success">Completada</span></td>
                                <td>5547446900</td>
                            </tr>
                            <tr>
                                <td>15/09/2023 14:15</td>
                                <td>Banco Nacional</td>
                                <td>Maria Garcia (10324)</td>
                                <td>5534567890</td>
                                <td>02:45</td>
                                <td><span class="badge badge-success">Completada</span></td>
                                <td>5547446900</td>
                            </tr>
                            <tr>
                                <td>15/09/2023 13:58</td>
                                <td>Banco Nacional</td>
                                <td>Carlos Lopez (10325)</td>
                                <td>5587654321</td>
                                <td>00:00</td>
                                <td><span class="badge badge-warning">Fallida</span></td>
                                <td>5547446900</td>
                            </tr>
                            <tr>
                                <td>15/09/2023 13:40</td>
                                <td>Centro Comercial Plaza</td>
                                <td>Ana Martinez (10326)</td>
                                <td>5512345678</td>
                                <td>07:32</td>
                                <td><span class="badge badge-success">Completada</span></td>
                                <td>5547446901</td>
                            </tr>
                            <tr>
                                <td>15/09/2023 12:25</td>
                                <td>Banco Nacional</td>
                                <td>Juan Perez (10323)</td>
                                <td>5566774545</td>
                                <td>03:15</td>
                                <td><span class="badge badge-success">Completada</span></td>
                                <td>5547446900</td>
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