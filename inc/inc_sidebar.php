
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <i class="fas fa-shield-alt fa-2x"></i>
        <h2>Safe IPS</h2>
    </div>
    <ul class="sidebar-menu">

        <?php
        $adminPages = ['DIDS', 'EMPRESAS', 'USUARIOS'];
        $operationsPages = ['TSPS', 'CLIENTES'];
        $reportPages = ['REPORTE_DIDS', 'REPORTE_TSPS', 'REPORTE_CLIENTES', 'AUDITORIA'];
        ?>

        <li><a href="/pages/dashboard.php" class="<?php echo ($activePage == 'DASHBOARD') ? 'active' : ''; ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

        <li>
            <button class="menu-toggle-btn" onclick="toggleSubmenu('admin-menu')">
                <span><i class="fas fa-cog"></i> Administración</span>
                <i class="fas fa-chevron-down <?php echo in_array($activePage, $adminPages) ? 'fa-chevron-up' : ''; ?>" id="admin-menu-chevron"></i>
            </button>
            <ul class="submenu <?php echo in_array($activePage, $adminPages) ? 'expanded' : ''; ?>" id="admin-menu">
                <li><a href="/pages/dids.php" class="<?php echo ($activePage == 'DIDS') ? 'active' : ''; ?>"><i class="fas fa-phone"></i> DID's</a></li>
                <li><a href="/pages/companies.php" class="<?php echo ($activePage == 'EMPRESAS') ? 'active' : ''; ?>"><i class="fas fa-building"></i> Empresas</a></li>
                <li><a href="/pages/users.php" class="<?php echo ($activePage == 'USUARIOS') ? 'active' : ''; ?>"><i class="fas fa-users-cog"></i> Usuarios</a></li>
            </ul>
        </li>

        <li>
            <button class="menu-toggle-btn" onclick="toggleSubmenu('operations-menu')">
                <span><i class="fas fa-tasks"></i> Operaciones</span>
                <i class="fas fa-chevron-down <?php echo in_array($activePage, $operationsPages) ? 'fa-chevron-up' : ''; ?>" id="operations-menu-chevron"></i>
            </button>
            <ul class="submenu <?php echo in_array($activePage, $operationsPages) ? 'expanded' : ''; ?>" id="operations-menu">
                <li><a href="/pages/tsps.php" class="<?php echo ($activePage == 'TSPS') ? 'active' : ''; ?>"><i class="fas fa-user-shield"></i> TSP's</a></li>
                <li><a href="/pages/clients.php" class="<?php echo ($activePage == 'CLIENTES') ? 'active' : ''; ?>"><i class="fas fa-users"></i> Directorio Ejecutivos</a></li>
            </ul>
        </li>

        <li>
            <button class="menu-toggle-btn" onclick="toggleSubmenu('reports-menu')">
                <span><i class="fas fa-chart-bar"></i> Reportes</span>
                <i class="fas fa-chevron-down <?php echo in_array($activePage, $reportPages) ? 'fa-chevron-up' : ''; ?>" id="reports-menu-chevron"></i>
            </button>
            <ul class="submenu <?php echo in_array($activePage, $reportPages) ? 'expanded' : ''; ?>" id="reports-menu">
                <li><a href="/pages/reports_dids.php" class="<?php echo ($activePage == 'REPORTE_DIDS') ? 'active' : ''; ?>"><i class="fas fa-hashtag"></i> DID's asignados </a></li>
                <li><a href="/pages/reports_tsp_calls.php" class="<?php echo ($activePage == 'REPORTE_TSPS') ? 'active' : ''; ?>"><i class="fas fa-phone"></i> Llamadas TSP</a></li>
                <li><a href="/pages/reports_client_calls.php" class="<?php echo ($activePage == 'REPORTE_CLIENTES') ? 'active' : ''; ?>"><i class="fas fa-phone-alt"></i> Llamadas Ejecutivos</a></li>
                <li><a href="/pages/audit.php" class="<?php echo ($activePage == 'AUDITORIA') ? 'active' : ''; ?>"><i class="fas fa-clipboard-list"></i> Auditoría</a></li>
            </ul>
        </li>
    </ul>
</div>