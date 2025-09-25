<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Safe Communications IPS - Sistema Completo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <!-- Login Screen -->
  <div id="login-screen" class="login-container">
    <div class="login-box">
      <div class="login-header">
        <h1><i class="fas fa-shield-alt"></i> Safe Communications IPS</h1>
        <p>Portal de Administración Segura</p>
      </div>
      <div class="login-body">
        <div class="form-group">
          <label for="username">Usuario</label>
          <input type="text" id="username" class="form-control" placeholder="Ingresa tu usuario">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" class="form-control" placeholder="Ingresa tu contraseña">
        </div>
        <button id="login-btn" class="btn btn-primary" style="width: 100%; justify-content: center;">
          <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
        </button>
      </div>
      <div class="login-footer">
        Sistema seguro de comunicaciones para Grupo IPS
      </div>
    </div>
  </div>

  <!-- Main App -->
  <div id="app" class="app-container">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <div class="sidebar-header">
        <i class="fas fa-shield-alt fa-2x"></i>
        <h2>Safe IPS</h2>
      </div>
      <ul class="sidebar-menu">
        <li><a href="#" class="active" data-section="dashboard"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        </li>

        <li>
          <button class="menu-toggle-btn" onclick="toggleSubmenu('admin-menu')">
            <span><i class="fas fa-cog"></i> Administración</span>
            <i class="fas fa-chevron-down" id="admin-menu-chevron"></i>
          </button>
          <ul class="submenu" id="admin-menu">
            <li><a href="#" data-section="dids-admin"><i class="fas fa-phone"></i> DID's</a></li>
            <li><a href="#" data-section="companies"><i class="fas fa-building"></i> Empresas</a></li>
            <li><a href="#" data-section="users"><i class="fas fa-users-cog"></i> Usuarios</a></li>
          </ul>
        </li>

        <li>
          <button class="menu-toggle-btn" onclick="toggleSubmenu('operations-menu')">
            <span><i class="fas fa-tasks"></i> Operaciones</span>
            <i class="fas fa-chevron-down" id="operations-menu-chevron"></i>
          </button>
          <ul class="submenu" id="operations-menu">
            <li><a href="#" data-section="tsps"><i class="fas fa-user-shield"></i> TSP's</a></li>
            <li><a href="#" data-section="clients"><i class="fas fa-users"></i> Directorio Ejecutivos</a></li>
          </ul>
        </li>

        <li>
          <button class="menu-toggle-btn" onclick="toggleSubmenu('reports-menu')">
            <span><i class="fas fa-chart-bar"></i> Reportes</span>
            <i class="fas fa-chevron-down" id="reports-menu-chevron"></i>
          </button>
          <ul class="submenu" id="reports-menu">
            <li><a href="#" data-section="dids"><i class="fas fa-hashtag"></i> DID's asignados </a></li>
            <li><a href="#" data-section="reports"><i class="fas fa-phone"></i> Llamadas TSP</a></li>
            <li><a href="#" data-section="contact-calls"><i class="fas fa-phone-alt"></i> Llamadas Ejecutivos</a></li>
            <li><a href="#" data-section="audit"><i class="fas fa-clipboard-list"></i> Auditoría</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Header -->
      <div class="header">
        <h1 id="section-title">Dashboard</h1>
        <div class="user-menu">
          <div class="user-info">
            <div class="user-name">Admin Usuario</div>
            <div class="user-role">Administrador Sistema</div>
          </div>
          <button class="logout-btn" id="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
          </button>
        </div>
      </div>

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
            <input type="text" class="filter-input" placeholder="Nombre o ID de empresa" id="search-company">
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
                  <button class="btn-icon btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                  <button class="btn-icon btn-delete" title="Eliminar" onclick="confirmDelete('DID')"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>5547446901</td>
                <td>15/09/2023</td>
                <td>
                  <button class="btn-icon btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                  <button class="btn-icon btn-delete" title="Eliminar" onclick="confirmDelete('DID')"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>5584284447</td>
                <td>10/09/2023</td>
                <td>
                  <button class="btn-icon btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                  <button class="btn-icon btn-delete" title="Eliminar" onclick="confirmDelete('DID')"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>5584284448</td>
                <td>10/09/2023</td>
                <td>
                  <button class="btn-icon btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                  <button class="btn-icon btn-delete" title="Eliminar" onclick="confirmDelete('DID')"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>5584284449</td>
                <td>10/09/2023</td>
                <td>
                  <button class="btn-icon btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                  <button class="btn-icon btn-delete" title="Eliminar" onclick="confirmDelete('DID')"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>5584284450</td>
                <td>12/09/2023</td>
                <td>
                  <button class="btn-icon btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                  <button class="btn-icon btn-delete" title="Eliminar" onclick="confirmDelete('DID')"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td>5584284451</td>
                <td>12/09/2023</td>
                <td>
                  <button class="btn-icon btn-edit" title="Editar"><i class="fas fa-edit"></i></button>
                  <button class="btn-icon btn-delete" title="Eliminar" onclick="confirmDelete('DID')"><i
                      class="fas fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

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
                  <div class="data-title"><i class="fas fa-info-circle"></i> Instrucción para el TSP</div>
                  <div class="data-subtitle">Debe marcar al: <span class="ivr-number">5547446900</span> y luego ingresar
                    su PIN</div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
              <button class="btn-icon btn-delete" onclick="confirmDelete('TSP')"><i class="fas fa-trash"></i></button>
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
                  <div class="data-title"><i class="fas fa-info-circle"></i> Instrucción para el TSP</div>
                  <div class="data-subtitle">Debe marcar al: <span class="ivr-number">5547446900</span> y luego ingresar
                    su PIN</div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
              <button class="btn-icon btn-delete" onclick="confirmDelete('TSP')"><i class="fas fa-trash"></i></button>
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
                  <div class="data-title"><i class="fas fa-info-circle"></i> Instrucción para el TSP</div>
                  <div class="data-subtitle">Debe marcar al: <span class="ivr-number">5547446901</span> y luego ingresar
                    su PIN</div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
              <button class="btn-icon btn-delete" onclick="confirmDelete('TSP')"><i class="fas fa-trash"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Clients Section -->
      <div id="clients-section" class="section">
        <div class="section-header">
          <h2 class="section-title">Gestión de Ejecutivos</h2>
          <div>
            <button class="btn" style="background: #7c3aed; color: white;" id="import-clients-btn">
              <i class="fas fa-file-import"></i> Importar
            </button>
            <button class="btn btn-primary" id="add-client-btn">
              <i class="fas fa-plus"></i> Nuevo Ejecutivo
            </button>
          </div>
        </div>

        <div class="filters">
          <div class="filter-group">
            <span class="filter-label">Buscar:</span>
            <input type="text" class="filter-input" placeholder="Número o puesto" id="search-client">
          </div>
          <div class="filter-group">
            <span class="filter-label">Empresa:</span>
            <select class="filter-select" id="client-company-filter">
              <option>Todas las empresas</option>
              <option>Banco Nacional</option>
              <option>Centro Comercial Plaza</option>
              <option>Hospital Central</option>
            </select>
          </div>
          <button class="btn btn-primary" id="filter-clients-btn">
            <i class="fas fa-filter"></i> Filtrar
          </button>
        </div>

        <div class="card-grid">
          <div class="data-card">
            <div class="card-header">
              <div class="card-title">Director General</div>
              <span class="status status-active">Activo</span>
            </div>
            <div class="card-body">
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">Empresa: Banco Nacional</div>

                  <div class="data-subtitle">ID: 7645DAN</div>
                </div>
              </div>
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">No. Telefónico: 55*****545</div>
                  <div class="data-subtitle">PIN: 4456</div>
                </div>
              </div>
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">Fecha de registro: 05/09/2023</div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
              <button class="btn-icon btn-delete" onclick="confirmDelete('ejecutivo')"><i
                  class="fas fa-trash"></i></button>
            </div>
          </div>

          <div class="data-card">
            <div class="card-header">
              <div class="card-title">Supervisor Turno</div>
              <span class="status status-active">Activo</span>
            </div>
            <div class="card-body">
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">Empresa: Banco Nacional</div>
                  <div class="data-subtitle">ID: 7646DAN</div>
                </div>
              </div>
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">No. Telefónico: 55*****890</div>
                  <div class="data-subtitle">PIN: 4457</div>
                </div>
              </div>
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">Fecha de registro: 06/09/2023</div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
              <button class="btn-icon btn-delete" onclick="confirmDelete('ejecutivo')"><i
                  class="fas fa-trash"></i></button>
            </div>
          </div>

          <div class="data-card">
            <div class="card-header">
              <div class="card-title">Gerente Operaciones</div>
              <span class="status status-inactive">Inactivo</span>
            </div>
            <div class="card-body">
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">Empresa: Banco Nacional</div>
                  <div class="data-subtitle">ID: 7647DAN</div>
                </div>
              </div>
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">No. Telefónico: 55*****321</div>
                  <div class="data-subtitle">PIN: 4458</div>
                </div>
              </div>
              <div class="data-item">
                <div class="data-content">
                  <div class="data-title">Fecha de registro: 07/09/2023</div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn-icon btn-edit"><i class="fas fa-edit"></i></button>
              <button class="btn-icon btn-delete" onclick="confirmDelete('ejecutivo')"><i
                  class="fas fa-trash"></i></button>
            </div>
          </div>
        </div>
      </div>

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
              <button class="btn-icon btn-delete" onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
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
              <button class="btn-icon btn-delete" onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
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
              <button class="btn-icon btn-delete" onclick="confirmDelete('DID')"><i class="fas fa-trash"></i></button>
            </div>
          </div>
        </div>
      </div>

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

      <!-- Audit Section -->
      <div id="audit-section" class="section">
        <div class="section-header">
          <h2 class="section-title">Registros de Auditoría</h2>
          <div>
            <button class="btn btn-primary" id="export-audit-btn">
              <i class="fas fa-download"></i> Exportar
            </button>
          </div>
        </div>

        <div class="filters">
          <div class="filter-group">
            <span class="filter-label">Fecha inicio:</span>
            <input type="date" class="filter-input" value="2023-09-01" id="audit-date-from">
          </div>
          <div class="filter-group">
            <span class="filter-label">Fecha fin:</span>
            <input type="date" class="filter-input" value="2023-09-15" id="audit-date-to">
          </div>
          <div class="filter-group">
            <span class="filter-label">Usuario:</span>
            <select class="filter-select" id="audit-user-filter">
              <option>Todos</option>
              <option>admin.ips</option>
              <option>supervisor.1</option>
            </select>
          </div>
          <div class="filter-group">
            <span class="filter-label">Acción:</span>
            <select class="filter-select" id="audit-action-filter">
              <option>Todas</option>
              <option>Creación</option>
              <option>Modificación</option>
              <option>Eliminación</option>
            </select>
          </div>
          <button class="btn btn-primary" id="filter-audit-btn">
            <i class="fas fa-filter"></i> Filtrar
          </button>
        </div>

        <div class="search-box">
          <input type="text" class="search-input" placeholder="Buscar en auditoría..." id="search-audit">
          <button class="search-button" id="search-audit-btn">
            <i class="fas fa-search"></i> Buscar
          </button>
        </div>

        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Fecha/Hora</th>
                <th>Usuario</th>
                <th>Módulo</th>
                <th>Acción</th>
                <th>Detalles</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>15/09/2023 14:32</td>
                <td>admin.ips</td>
                <td>TSP's</td>
                <td><span class="badge badge-success">Creación</span></td>
                <td>Nuevo TSP ID: 10327</td>
              </tr>
              <tr>
                <td>15/09/2023 13:15</td>
                <td>supervisor.1</td>
                <td>Directorio Ejecutivos</td>
                <td><span class="badge badge-secondary">Modificación</span></td>
                <td>Actualización de número: 5566774545</td>
              </tr>
              <tr>
                <td>15/09/2023 11:58</td>
                <td>admin.ips</td>
                <td>Empresas</td>
                <td><span class="badge badge-success">Creación</span></td>
                <td>Nueva empresa: Centro Comercial Plaza</td>
              </tr>
              <tr>
                <td>15/09/2023 10:40</td>
                <td>supervisor.1</td>
                <td>TSP's</td>
                <td><span class="badge badge-secondary">Modificación</span></td>
                <td>Asignación de empresa para TSP: 10323</td>
              </tr>
              <tr>
                <td>14/09/2023 16:20</td>
                <td>admin.ips</td>
                <td>Usuarios</td>
                <td><span class="badge badge-success">Creación</span></td>
                <td>Nuevo usuario: auditor.1</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Add TSP Modal -->
  <div class="modal-backdrop" id="tsp-modal">
    <div class="modal">
      <div class="modal-header">
        <h3 class="modal-title"><i class="fas fa-user-shield"></i> Agregar Nuevo TSP</h3>
        <button class="modal-close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <label for="tsp-id">ID Trabajador</label>
            <input type="text" id="tsp-id" class="form-control" placeholder="Ej: 10323">
          </div>
          <div class="form-group">
            <label for="tsp-status">Estatus</label>
            <select id="tsp-status" class="form-control">
              <option>Activo</option>
              <option>Inactivo</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="tsp-name">Nombre Completo</label>
          <input type="text" id="tsp-name" class="form-control" placeholder="Ej: Juan Perez">
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="tsp-callerid">No. Móvil Asignado</label>
            <input type="text" id="tsp-callerid" class="form-control" placeholder="Ej: 5511223344" maxlength="10">
          </div>
          <div class="form-group">
            <label for="tsp-pin">PIN Llamadas Salientes</label>
            <input type="text" id="tsp-pin" class="form-control" placeholder="Ej: 10345">
          </div>
        </div>

        <div class="form-group">
          <label for="tsp-did">No. Virtual Asignado a TSP</label>
          <select id="tsp-did" class="form-control">
            <option value="">Seleccionar número</option>
            <option value="5584284444">5584284444</option>
            <option value="5584284445">5584284445</option>
            <option value="5584284446">5584284446</option>
            <option value="5584284447">5584284447</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tsp-company">Empresa Asignada</label>
          <select id="tsp-company" class="form-control">
            <option value="">Seleccionar Empresa</option>
            <option value="EMP001">Banco Nacional</option>
            <option value="EMP002">Centro Comercial Plaza</option>
            <option value="EMP003">Hospital Central</option>
          </select>
        </div>



        <div class="form-group">
          <label for="tsp-notes">Observaciones</label>
          <textarea id="tsp-notes" class="form-control" placeholder="Ej: Guardia Estacionamiento" rows="2"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" style="background: var(--secondary); color: white;" id="cancel-tsp">Cancelar</button>
        <button class="btn btn-success">Guardar TSP</button>
      </div>
    </div>
  </div>

  <!-- Add Company Modal -->
  <div class="modal-backdrop" id="company-modal">
    <div class="modal">
      <div class="modal-header">
        <h3 class="modal-title"><i class="fas fa-building"></i> Agregar Nueva Empresa</h3>
        <button class="modal-close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <label for="company-id">ID Empresa</label>
            <input type="text" id="company-id" class="form-control" placeholder="Ej: EMP001">
          </div>
          <div class="form-group">
            <label for="company-status">Estatus</label>
            <select id="company-status" class="form-control">
              <option>Activo</option>
              <option>Inactivo</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="company-name">Nombre de la Empresa</label>
          <input type="text" id="company-name" class="form-control" placeholder="Ej: Banco Nacional">
        </div>

        <div class="form-group">
          <label for="company-did-ivr">Número DID</label>
          <select id="company-did-ivr" class="form-control">
            <option value="">Seleccionar número</option>
            <option value="5547446900">5547446900</option>
            <option value="5547446901">5547446901</option>
            <option value="5547446902">5547446902</option>
          </select>
          <small class="form-text">Número que los TSP marcarán para acceder al IVR</small>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn" style="background: var(--secondary); color: white;" id="cancel-company">Cancelar</button>
        <button class="btn btn-success">Guardar Empresa</button>
      </div>
    </div>
  </div>

  <!-- Add Client Modal -->
  <div class="modal-backdrop" id="client-modal">
    <div class="modal">
      <div class="modal-header">
        <h3 class="modal-title"><i class="fas fa-user-plus"></i> Agregar Nuevo Ejecutivo</h3>
        <button class="modal-close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group">
            <label for="client-id">ID Ejecutivo</label>
            <input type="text" id="client-id" class="form-control" placeholder="Ej: 7645DAN">
          </div>
          <div class="form-group">
            <label for="client-status">Estatus</label>
            <select id="client-status" class="form-control">
              <option>Activo</option>
              <option>Inactivo</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="client-company">Empresa</label>
          <select id="client-company" class="form-control">
            <option value="">Seleccionar Empresa</option>
            <option value="EMP001">Banco Nacional</option>
            <option value="EMP002">Centro Comercial Plaza</option>
            <option value="EMP003">Hospital Central</option>
          </select>
        </div>

        <div class="form-group">
          <label for="client-name">Cargo/Puesto</label>
          <input type="text" id="client-name" class="form-control" placeholder="Ej: Director General">
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="client-phone">No. Telefónico (10 dígitos)</label>
            <input type="text" id="client-phone" class="form-control" placeholder="Ej: 5566774545" maxlength="10">
          </div>
          <div class="form-group">
            <label for="client-pin">PIN Llamadas otro teléfono</label>
            <input type="text" id="client-pin" class="form-control" placeholder="Ej: 4456">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn" style="background: var(--secondary); color: white;" id="cancel-client">Cancelar</button>
        <button class="btn btn-success">Guardar Ejecutivo</button>
      </div>
    </div>
  </div>

  <!-- Add User Modal -->
  <div class="modal-backdrop" id="user-modal">
    <div class="modal">
      <div class="modal-header">
        <h3 class="modal-title"><i class="fas fa-user-plus"></i> Agregar Nuevo Usuario</h3>
        <button class="modal-close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="user-name">Nombre Completo</label>
          <input type="text" id="user-name" class="form-control" placeholder="Ej: Roberto Mendoza">
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="user-username">Usuario</label>
            <input type="text" id="user-username" class="form-control" placeholder="Ej: admin.ips">
          </div>
          <div class="form-group">
            <label for="user-email">Email</label>
            <input type="email" id="user-email" class="form-control" placeholder="Ej: usuario@ips.com">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="user-password">Contraseña</label>
            <input type="password" id="user-password" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <label for="user-role">Rol</label>
            <select id="user-role" class="form-control">
              <option>Administrador Sistema</option>
              <option>Administrador</option>
              <option>Auditor</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="user-company-access">Acceso a Empresas</label>
          <select id="user-company-access" class="form-control" multiple style="height: 120px;">
            <option value="all">Todas las empresas</option>
            <option value="EMP001">Banco Nacional</option>
            <option value="EMP002">Centro Comercial Plaza</option>
            <option value="EMP003">Hospital Central</option>
          </select>
          <small class="form-text">Mantén presionada la tecla Ctrl para seleccionar múltiples empresas</small>
        </div>

        <div class="form-group">
          <label for="user-status">Estatus</label>
          <select id="user-status" class="form-control">
            <option>Activo</option>
            <option>Inactivo</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn" style="background: var(--secondary); color: white;" id="cancel-user">Cancelar</button>
        <button class="btn btn-success">Guardar Usuario</button>
      </div>
    </div>
  </div>

  <!-- Add DID Modal -->
  <div class="modal-backdrop" id="did-modal">
    <div class="modal">
      <div class="modal-header">
        <h3 class="modal-title"><i class="fas fa-phone"></i> Agregar Nuevo DID</h3>
        <button class="modal-close">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="did-number">Número DID</label>
          <input type="text" id="did-number" class="form-control" placeholder="Ej: 5584284444" maxlength="10">
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn" style="background: var(--secondary); color: white;" id="cancel-did">Cancelar</button>
        <button class="btn btn-success">Guardar DID</button>
      </div>
    </div>
  </div>

  <button class="menu-toggle" id="menu-toggle">
    <i class="fas fa-bars"></i>
  </button>
</body>

<script src="./js/main.js" defer></script>
</html>
