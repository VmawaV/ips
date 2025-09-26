<!-- /pages/dids.php -->
<?php
$activePage = "DIDS";
$pageTitle = "DID's";
// session_start();
// if (!isset($_SESSION["user_id"])) { header("Location: /index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once '../inc/inc_head.php'; ?>
    <title>Administración de DIDs - Safe IPS</title>
</head>

<body>
    <div id="app" class="app-container" style="display: flex;">
        <?php require_once '../inc/inc_sidebar.php'; ?>

        <div class="main-content">
            <?php require_once '../inc/inc_topbar.php'; ?>

            <!-- DID's Admin Section -->
            <div id="dids-admin-section" class="section">
                <div class="section-header">
                    <h2 class="section-title">Administración de DID's</h2>
                    <div>
                        <button class="btn" style="background: #7c3aed; color: white;" id="import-dids-btn">
                            <i class="fas fa-file-import"></i> Importar CSV
                        </button>
                        <button class="btn btn-primary" id="add-did-admin-btn">
                            <i class="fas fa-plus"></i> Agregar DID
                        </button>
                    </div>
                </div>

                <div class="filters">
                    <div class="filter-group">
                        <span class="filter-label">Buscar:</span>
                        <input type="text" class="filter-input" placeholder="Número DID" id="search-did">
                    </div>
                    <button class="btn btn-primary" id="filter-dids-btn">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Número DID</th>
                                <th>Fecha de Carga</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="dids-table-body">
                            <tr>
                                <td>5547446900</td>
                                <td>15/09/2023</td>
                                <td>
                                    <button class="btn-icon btn-edit" title="Editar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete" title="Eliminar"
                                        onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5547446901</td>
                                <td>15/09/2023</td>
                                <td>
                                    <button class="btn-icon btn-edit" title="Editar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete" title="Eliminar"
                                        onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5584284447</td>
                                <td>10/09/2023</td>
                                <td>
                                    <button class="btn-icon btn-edit" title="Editar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete" title="Eliminar"
                                        onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5584284448</td>
                                <td>10/09/2023</td>
                                <td>
                                    <button class="btn-icon btn-edit" title="Editar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete" title="Eliminar"
                                        onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5584284449</td>
                                <td>10/09/2023</td>
                                <td>
                                    <button class="btn-icon btn-edit" title="Editar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete" title="Eliminar"
                                        onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5584284450</td>
                                <td>12/09/2023</td>
                                <td>
                                    <button class="btn-icon btn-edit" title="Editar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete" title="Eliminar"
                                        onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5584284451</td>
                                <td>12/09/2023</td>
                                <td>
                                    <button class="btn-icon btn-edit" title="Editar"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete" title="Eliminar"
                                        onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

    <?php require_once '../inc/inc_modals.php'; ?>
    <?php require_once '../inc/inc_footer_scripts.php'; ?>

    <script src="/js/dids.js"></script>
</body>

</html>