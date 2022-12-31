    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media() ?>images/uploads/punk.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">
            <?php
            $cadena = $_SESSION['userData']['nombre'];
            $nombre = explode(' ', trim($cadena));
            echo $nombre[0];
            ?></p>
          <p class="app-sidebar__user-designation"> <?= $_SESSION['userData']['nombrerol']; ?>
        </div>
      </div>
      <ul class="app-menu">
        <?php if (!empty($_SESSION['permisos'][1]['r'])) { ?>
          <li>
            <a class="app-menu__item" href="<?= base_url() ?>dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
          </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][2]['r'])) { ?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview">
              <i class="app-menu__icon fa-solid fa-users"></i>
              <span class="app-menu__label">Empleados</span>
              <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="<?= base_url() ?>empleados"><i class="app-menu__icon fa-solid fa-user-group"></i>Empleados</a></li>
              <li><a class="treeview-item" href="<?= base_url() ?>roles"><i class="app-menu__icon fa-solid fa-people-arrows"></i>Roles</a></li>
            </ul>
          </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][3]['r'])) { ?>
          <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
              <i class="app-menu__icon fa-solid fa-user-tag"></i>
              <span class="app-menu__label">Clientes</span>
              <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="<?= base_url() ?>clientes"><i class="app-menu__icon fa-solid fa-plus"></i>Crear Cliente</a></li>
              <li><a class="treeview-item" href="<?= base_url() ?>roles"><i class="app-menu__icon fa-solid fa-magnifying-glass"></i>Consultar Clientes</a></li>
              <li><a class="treeview-item" href="<?= base_url() ?>permisos"><i class="app-menu__icon fa-solid fa-gear"></i>Opciones</a></li>
            </ul>
          </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][4]['r']) || !empty($_SESSION['permisos'][8]['r']) ) { ?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview">
              <i class="app-menu__icon fa-solid fa-truck-ramp-box"></i>
              <span class="app-menu__label">Inventario</span>
              <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
            <?php if (!empty($_SESSION['permisos'][4]['r'])) { ?>
              <li><a class="treeview-item" href="<?= base_url() ?>productos"><i class="app-menu__icon fa-solid fa-solid fa-briefcase"></i>Productos</a></li>
              <?php } ?>
              <?php if (!empty($_SESSION['permisos'][8]['r'])) { ?>
              <li><a class="treeview-item" href="<?= base_url() ?>categorias"><i class="app-menu__icon fa-solid fa-ellipsis-vertical"></i>Categorias</a></li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][5]['r'])) { ?>
          <li>
            <a class="app-menu__item" href="<?= base_url() ?>eventos">
              <i class="app-menu__icon fa-solid fa-trophy"></i>
              <span class="app-menu__label">Eventos</span>
            </a>
          </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][6]['r'])) { ?>
        <li>
          <a class="app-menu__item" href="<?= base_url() ?>pedidos">
            <i class="app-menu__icon fa-solid fa-cart-plus"></i>
            <span class="app-menu__label">Pedidos</span>
          </a>
        </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][7]['r'])) { ?>
        <li>
          <a class="app-menu__item" href="<?= base_url() ?>ventas">
            <i class="app-menu__icon fa-regular fa-money-bill-1"></i>
            <span class="app-menu__label">Ventas</span>
          </a>
        </li>
        <?php } ?>
        <li>
          <a class="app-menu__item" href="<?= base_url() ?>logout">
            <i class="app-menu__icon fa-solid fa-arrow-right-from-bracket"></i>
            <span class="app-menu__label">Cerrar Sesion</span>
          </a>
        </li>
      </ul>
    </aside>