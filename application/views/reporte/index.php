  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>

      <div class="box-body">
        <div class="tabbable">
          <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
            <li class="active">
              <a data-toggle="tab" href="#home4">En stock</a>
            </li>

            <li>
              <a data-toggle="tab" href="#profile4">Por Terminar</a>
            </li>

            <li>
              <a data-toggle="tab" href="#dropdown14">Sin Stock</a>
            </li>
          </ul>

          <div class="tab-content">
            <div id="home4" class="tab-pane in active">
              <span><a href="reporte/print_stock_productos" target="_blank" class='btn btn-flat btn-warning' id='printReporte'><i class='fa fa-print'></i> Exportar</a></span><br><br>
              <table class="table table-bordered table-hover" id="tblStock">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th width="100">Condición</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($alto as $obj){ ?>
                    <tr class="option-stock" style="cursor:pointer;" key-id="<?php echo $obj->id_pro; ?>">
                      <td style="vertical-align: middle"><?php echo $obj->desc_pro; ?></td>
                      <td align="center" style="color:#95d16f"><i class="fa fa-circle fa-2x"></i></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>

            <div id="profile4" class="tab-pane">
              <table class="table table-bordered table-hover" id="tblPorTerminarStock">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th width="100">Condición</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($medio as $obj){ ?>
                    <tr class="option-stock" style="cursor:pointer;" key-id="<?php echo $obj->id_pro; ?>">
                      <td style="vertical-align: middle"><?php echo $obj->desc_pro; ?></td>
                      <td align="center" style="color:#ffe000"><i class="fa fa-circle fa-2x"></i></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>

            <div id="dropdown14" class="tab-pane">
              <table class="table table-bordered table-hover" id="tblSinStock">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th width="100">Condición</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($nada as $obj){ ?>
                    <tr class="option-stock" style="cursor:pointer;" key-id="<?php echo $obj->id_pro; ?>">
                      <td style="vertical-align: middle"><?php echo $obj->desc_pro; ?></td>
                      <td align="center" style="color:#ff0707"><i class="fa fa-circle fa-2x"></i></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="box-footer">
      </div>
    </div>
  </section>
  <?php require("form.php"); ?>
