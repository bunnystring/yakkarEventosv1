<div class="modal fade modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" style="color: white;">Permisos Roles de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>

            <div class="modal-body">
                <?php
                   // dep($data);
                ?>
                <div class="col-md-12">
                    <div class="tile">

                        <form action="" id="formPermisos" name="formPermisos">
                            <!-- Capturamos el id del rol -->
                            <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required=""> 
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="text-align:center;">
                                    <tr>
                                        <th>#</th>
                                        <th>Módulo</th>
                                        <th>Ver</th>
                                        <th>Crear</th>
                                        <th>Actualizar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=1; //
                                        $modulos = $data['modulos']; //TODO: data es todo el array  ingresar al item modulos
                                        for ($i=0; $i < count($modulos); $i++) { 
                                            //TODO: Recorrer todo el array contará hasta llegar a la canitdad de elementos que tenga el itemmodulos
                                            $permisos = $modulos[$i]['permisos']; //TODO: va hacer igual a la variable modulos en su posicion[i]
                                            $rCheck = $permisos['r'] == 1 ? " checked " : ""; //TODO: Verificando si lo que hay en el item r es igual a 1 va obtener el valor de check de lo contrario estará vacio
                                            $wCheck = $permisos['w'] == 1 ? " checked " : "";
                                            $uCheck = $permisos['u'] == 1 ? " checked " : "";
                                            $dCheck = $permisos['d'] == 1 ? " checked " : "";

                                            $idmod = $modulos[$i]['idmodulo'];
                                        
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no; ?>
                                            <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
                                        </td>
                                        <td>
                                            <?= $modulos[$i]['titulo']; ?>
                                        </td>
                                        <td>
                                            <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit"><i class="app-menu__icon fas fa-check-circle" aria-hidden="true"></i>Guardar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="app-menu__icon fas fa-sign-out-alt" aria-hidden="true"></i>Salir</button>         
                        </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>