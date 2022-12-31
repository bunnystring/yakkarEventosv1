<!-- Modal -->
<div class="modal fade" id="modalFormEmpleado" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formEmpleado" name="formEmpleado" class="form-horizontal">
                            <input type="hidden" id="idEmpleado" name="idEmpleado" value="">
                            <p class="text-primary">Todos los campos son obligatorios</p>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="txtIdentificacion" class="control-label">Identificacion</label>
                                    <input class="form-control valid validNumber" type="text" id="txtIdentificacion" name="txtIdentificacion" placeholder="Identificacion" required="" onkeypress="return controlTag(event);">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="txtNombre" class="control-label">Nombre</label>
                                    <input class="form-control valid validText" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del Empleado" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtEmail" class="control-label">Email</label>
                                    <input class="form-control valid validEmail" id="txtEmail" name="txtEmail" type="email" placeholder="Correo Electronico" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="listRolid">Tipo Empleado</label>
                                    <select class="form-control" data-live-search="true" id="listRolid" name="listRolid" required>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtCargo" class="control-label">Celular</label>
                                    <input class="form-control valid validNumber" id="txtCelular" name="txtCelular" type="text" placeholder="Telefono del Empleado" required="" onkeypress="return controlTag(event);">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="listStatus">Estado</label>
                                    <select class="form-control selectpicker" id="listStatus" name="listStatus">
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtUsuario" class="control-label">Usuario</label>
                                    <input class="form-control" id="txtUsuario" name="txtUsuario" type="text" placeholder="Usuario">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="txtClave" class="control-label">Clave de Usuario</label>
                                    <input class="form-control" id="txtClave" name="txtClave" type="password" placeholder="Clave">
                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-success" id="btnActionForm" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewEmpleado" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos del Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td id="celNombre">Arlez</td>
                                </tr>
                                <tr>
                                    <td>Identificacion</td>
                                    <td id="celIdentificacion">1022428022</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td id="celEmail">Acceron2@misena.edu.co</td>
                                </tr>
                                <tr>
                                    <td>Celular</td>
                                    <td id="celCelular">3008490788</td>
                                </tr>
                                <tr>
                                    <td>Cargo</td>
                                    <td id="celTipoEmpleado">Administrador</td>
                                </tr>
                                <tr>
                                    <td>Usuario</td>
                                    <td id="celUsuario">Camilo</td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td id="celEstado">Activo</td>
                                </tr>
                                <tr>
                                    <td>Fecha Registro</td>
                                    <td id="celFechaRegistro">18/06/1997</td>
                                </tr>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>