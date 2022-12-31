
<?php headerAdmin($data); ?>
<main class="app-content">
<?php
    getModal('modalEmpleados',$data);
    $read = $_SESSION["permisoMod"]['r'];
    $writing = $_SESSION["permisoMod"]['w'];
    $update = $_SESSION["permisoMod"]['u'];
    $delete = $_SESSION["permisoMod"]['d'];
    if ($read == 0) {
?>
      <p>Acceso restringido</p>
      <?php 
    }else{
      // dep($_SESSION['permisoMod']);
      ?>
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa-solid fa-people-arrows"></i> <?= $data['page_title']?>
          <?php if ($writing == 1) {?>
          <button class="btn btn-success" type="button" onclick="openModal();"><i class="fa-solid fa-plus"></i> Nuevo</button>
          <?php } ?>
          </h1>
          <p>Empieza Modulo Empleados</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url();?>empleados"><?= $data['page_title']?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableEmpleados">
                  <thead style="text-align: center;">
                    <tr>
                      <th>ID</th>
                      <th>Nombres</th>
                      <th>Cargo</th>
                      <th>Email</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </main>
    <?php footerAdmin($data); ?>
  