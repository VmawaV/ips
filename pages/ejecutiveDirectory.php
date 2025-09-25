<!-- Directorio ejecutivos -->
 
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
                <button class="btn-icon btn-delete" onclick="confirmDelete('ejecutivo')"><i class="fas fa-trash"></i></button>
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
                <button class="btn-icon btn-delete" onclick="confirmDelete('ejecutivo')"><i class="fas fa-trash"></i></button>
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
                <button class="btn-icon btn-delete" onclick="confirmDelete('ejecutivo')"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>