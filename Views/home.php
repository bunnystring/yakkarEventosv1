<!DOCTYPE html>
<!DOCTYPE html>
<!--Le indica al navegador que el tipo de archivo que esta leyendo es HTML-->
<html lang="en">
<!--Idioma-->

<head>
    <!--Cabecera-->
    <meta charset="UTF-8"> <!-- Codificacion -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Compatibilidad dispositivos moviles-->
    <title>YAKKAR EVENTOS</title>
    <!--Tituto de la pagina-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.css">
    <!--Ruta de acceso a los estilos-->
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo base_url(); ?>Assets/js/scrollreveal.js"></script>


    <!--Ruta de acceso para los iconos-->
</head>

<body>
    <!--Cuerpo de la pagina-->
    <header>
        <!--representa elementos de encabezado-->
        <div class="container__menu">
            <!--Divisiones contiene el todo el menu-->
            <div class="menu">
                <input type="checkbox" name="" id="check__menu">
                <!--Boton de tipo check para hacer operaciones con el menu responsivo-->
                <label for="check__menu">
                    <!--Etiqueta que contiene el icono bars del menu responsivo-->
                    <i class="fa-solid fa-bars icon__menu"></i>
                    <!--Icono menu traido por awasome desde su cdn-->
                </label>
                <nav>
                    <!--Etiqueta para para los enlaces de navegacion del menu-->
                    <ul>
                        <!--Lista no ordenada que contiene los enlaces del menu-->
                        <li><a href="#" id="selected"></a></li>
                        <!--items que contiene las anclas-->
                        <li>
                            <a href="">Nosotros</a>
                        </li>
                        <li>
                            <a href="#">Contactanos</a>
                        </li>
                        <li>
                            <a href="#">Eventos</a>
                        </li>
                        <li>
                        <li><a href="<?php echo base_url(); ?>login">Iniciar Sesion</a></li>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="content__slider">
        <div class="slideshow">
            <ul class="slider">
                <li>
                    <img src="<?php echo base_url(); ?>Assets/images/uploads/1.jpg" alt="">
                    <section class="caption">
                        <h1>Matrimonio</h1>
                        <p>Muchas parejas prefieren yakkar como el organizador para su matrimonio.</p>
                    </section>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>Assets/images/uploads/2.jpg" alt="">
                    <section class="caption">
                        <h1>Reunion Especial</h1>
                        <p>Haz que tu reunion tenga los mejores comentarios y las mejores experiencia con yakkar</p>
                    </section>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>Assets/images/uploads/3.jpg" alt="">
                    <section class="caption">
                        <h1>15 Años</h1>
                        <p>Cumplir 15 años no es de todos los dias es el gran paso de ser niña a mujer vivelo con yakkar</p>
                    </section>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>Assets/images/uploads/4.jpg" alt="">
                    <section class="caption">
                        <h1>Cumpleaños</h1>
                        <p>El cumpleaños es un dia muy especial y en yakkar tenemos las mejores ideas para hacer de tu cumpleaños un dia inolvidable.</p>
                    </section>
                </li>
            </ul>

            <ol class="pagination">

            </ol>

            <div class="left">
                <span class="fa fa-chevron-left"></span>
            </div>

            <div class="right">
                <span class="fa fa-chevron-right"></span>
            </div>

        </div>
    </div>

</body>
<footer>
    <?php footer($data); ?> 
    <script src="https://use.fontawesome.com/88d7401e5f.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/functions_home.js"></script>
</footer>

</html>