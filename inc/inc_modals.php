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
                    <input type="text" id="tsp-callerid" class="form-control" placeholder="Ej: 5511223344"
                        maxlength="10">
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
                <textarea id="tsp-notes" class="form-control" placeholder="Ej: Guardia Estacionamiento"
                    rows="2"></textarea>
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
            <button class="btn" style="background: var(--secondary); color: white;"
                id="cancel-company">Cancelar</button>
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
                    <input type="text" id="client-phone" class="form-control" placeholder="Ej: 5566774545"
                        maxlength="10">
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