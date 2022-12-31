<?php headerLogin($data);
?>

<body>
    <div>
    <div class="login-box">
        <div id="divLoading">
            <img src="<?= media(); ?>images/uploads/loading.svg" alt="Loading">
        </div>
    </div>
    <form action="" name="formLogin" id="formLogin" method="post" class="formulario" autocomplete="off">
        <!--Etiqueta que indica al navegador que es un formularios-->
        <h2 class="formulario__titulo"><i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesion</h2>
        <div class="divimg-login">
            <img class="img-login" src="<?= media() ?>images/uploads/data.svg" alt="" srcset="">
        </div>
        <div class="formulario__container">
            <!--Contenedor div de elementos del formulario-->
            <div class="formulario__grupo">
                <input type="email" name="txtEmail" id="txtEmail" class="form__input" placeholder=" " autofocus>
                <label for="txtEmail" class="form__label"><i class="fas fa-user"></i> Usuario</label>
                <span class="form__line"></span>
            </div>
            <div class="formulario__grupo">
                <input type="password" name="txtClave" id="txtClave" class="form__input" placeholder=" ">
                <label for="txtClave" class="form__label"><i class="fas fa-lock"></i> Clave:</label>
                <span class="form__line"></span>
            </div>
            <div id="alertLogin" class="text-center"></div>
            <button type="submit" class="form__submit"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</button>
            <!--Input de submit  envia datos del usuario -->
            <div class="formulario__grupo ">
                <div class="utility">
                    <p class="formulario__parrafo modal_olvidoC"><a href="#" class="modal_olvidoC">¿Olvidaste tu Contraseña?</a></p>
                </div>
            </div>
        </div>
    </form>

    <section class="modales">
        <div class="modal__container">
            <form id="formRecetPass" name="formRecetPass" class="formulario" action="">
            <div class="div_close">
            <a href="#" class="modal__close"><i class="fa-solid fa-circle-xmark"></i></a>
            </div>
                <div class="formulario__container">
                    <h3 class="login-head">¿Olvidaste tu Contraseña?</h3>
                    <div class="divimg-login">
                        <img class="img-login" src="<?= media() ?>images/uploads/pass.svg" alt="" srcset="">
                    </div>
                    <div class="formulario__grupo">
                        <input type="email" name="txtEmailReset" id="txtEmailReset" class="form__input" placeholder=" " autofocus>

                        <label for="txtEmailReset" class="form__label"><i class="fas fa-user"></i> Email</label>

                        <span class="form__line"></span>
                    </div>
                    <button type="submit" class="form__submit"><i class="fas fa-sign-in-alt"></i> Enviar</button>

                </div>
            </form>
        </div>
    </section>
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