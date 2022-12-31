<?php headerLogin($data);
?>

<body>
    <div>
        <div class="login-box">
            <div id="divLoading">
                <img src="<?= media(); ?>images/uploads/loading.svg" alt="Loading">
            </div>
        </div>
        <form action="" name="formCambiarPass" id="formCambiarPass" method="post" class="formulario" autocomplete="off">
            <input type="hidden" id="idEmpleado" name="idEmpleado" value="<?= $data['id_empleado']; ?>">
            <input type="hidden" id="txtEmail" name="txtEmail" value="<?= $data['email']; ?>">
            <input type="hidden" id="txtToken" name="txtToken" value="<?= $data['token']; ?>">
            <!--Etiqueta que indica al navegador que es un formularios-->
            <h2 class="formulario__titulo"><i class="fa-solid fa-key"></i>Cambiar Contraseña</h2>
            <div class="divimg-login">
                <img class="img-login" src="<?= media() ?>images/uploads/putpass.svg" alt="" srcset="">
            </div>
            <div class="formulario__container">
                <div class="formulario__grupo">
                    <input type="password" name="txtClave" id="txtClave" class="form__input" placeholder=" " required>
                    <label for="txtClave" class="form__label"><i class="fas fa-lock"></i> Nueva Contraseña:</label>
                    <span class="form__line"></span>
                </div>
                <div class="formulario__grupo">
                    <input type="password" name="txtClaveConfirm" id="txtClaveConfirm" class="form__input" placeholder=" " required>
                    <label for="txtClave" class="form__label"><i class="fas fa-lock"></i> Confirmar Contraseña:</label>
                    <span class="form__line"></span>
                </div>
                <div id="alertLogin" class="text-center"></div>
                <button type="submit" class="form__submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                <!--Input de submit  envia datos del usuario -->
            </div>
        </form>
    </div>

    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media() ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= media() ?>js/popper.min.js"></script>
    <script src="<?= media() ?>js/bootstrap.min.js"></script>
    <script src="<?= media() ?>js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media() ?>js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="<?= media() ?>js/plugins/sweetalert.min.js"></script>
    <script src="<?= media() ?>js/<?= $data['page_functions_js']; ?>"></script>


</body>