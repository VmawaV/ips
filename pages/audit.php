
<!-- Auditoria -->
 
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