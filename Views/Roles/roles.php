
<?php headerAdmin($data); 
      getModal('modalRoles',$data);
      $read = $_SESSION["permisoMod"]['r'];
      $writing = $_SESSION["permisoMod"]['w'];
      $update = $_SESSION["permisoMod"]['u'];
      $delete = $_SESSION["permisoMod"]['d'];
?>
<div id="contentAjax"></div>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa-solid fa-people-arrows"></i> <?= $data['page_title']?>
          <?php if ($writing == 1) {?>
          <button class="btn btn-success" type="button" onclick="openModal();"><i class="fa-solid fa-plus"></i> Nuevo</button>
          <?php } ?>
          </h1>
          <p>Empieza Modulo Roles</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url();?>roles"><?= $data['page_title']?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableRoles">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
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
    </main>
    <?php footerAdmin($data); ?>
  