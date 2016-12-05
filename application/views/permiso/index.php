<div class="content-wrapper">
  <!--<section class="content-header">
    <h1>
      Modulos
      <small>Panel de control</small>
    </h1>
          <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> System</a></li>
      <li class="active">Modulos</li>
    </ol>
  </section>-->

  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Permisos</h3>
      </div>

      <div class="box-body">
        <div class="row">
          <div class="col-sm-3">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Perfiles</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-12">
                    <select name="id_per" id="id_per" class="form-control">
                      <?php foreach($perfil as $obj){ ?>
                      <option value="<?php echo $obj->id_per?>"><?php echo $obj->name_per?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-9">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Modulos</h3>
              </div>
              <div class="box-body">
                <div class="row" id="container-permitido">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box-footer">
      </div>
    </div>
  </section>
</div>