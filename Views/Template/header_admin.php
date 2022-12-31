<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Navegadores descripcion de la pagina web -->
    <meta charset="utf-8">
    <meta name="description" content="Eventos & Ceremonias"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="athor" content="Arlez Camilo Ceron">
    <!-- Reflejado para dispositivos moviles -->
    <meta name="theme-color" content="#00315c"> 
    <!-- Icono para los navegadores -->
    <link rel="shortcut icon" href="<?= media() ?>images/uploads/logo.png" type="image/x-icon">
    <!-- Obteniendo datos del controlador -->
    <title><?= $data['page_tag']?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>css/main.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>css/bootstrap-select.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?= media() ?>css/style.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= base_url()?>dashboard">Yakkar</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?= base_url()?>opciones"><i class="fa fa-cog fa-lg"></i> Configuracion</a></li>
            <li><a class="dropdown-item" href="<?= base_url()?>perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
            <li><a class="dropdown-item" href="<?= base_url()?>logout"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <?php require_once("nav_admin.php") ?>