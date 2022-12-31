
<?php headerAdmin($data); 
    getModal('modalEmpleados',$data);
?>
    <main class="app-content">
      <?php 
      dep($_SESSION['permisos']);
      dep($_SESSION['permisoMod']);
      ?>
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa-solid fa-people-arrows"></i> <?= $data['page_title']?>
          <button class="btn btn-success" type="button" onclick="openModal();"><i class="fa-solid fa-plus"></i> Nuevo</button>
          </h1>
          <p>Start a beautiful journey here</p>
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
    </main>
    <?php footerAdmin($data); ?>
  