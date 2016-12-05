<div class="modal fade" id="modalMovimiento" tabindex="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 85%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Movimiento</h4>
      </div>

      <form id='formMovimiento' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_mov" name="id_mov" value="">
                    <span class="input-group-addon">Tipo Movimiento</span>
                    <select name="id_tmov" id="id_tmov" class="form-control" required>
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($tipo_movimiento as $obj){ ?>
                      <option value="<?php echo $obj->id_tmov; ?>"><?php echo $obj->desc_tmov; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <div class="input-group cboSalida">
                    <span class="input-group-addon">Procedencia</span>
                    <select name="id_proc" id="id_proc" class="form-control" required>
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($procedencia as $obj){ ?>
                      <option value="<?php echo $obj->id_proc; ?>"><?php echo $obj->desc_proc; ?></option>
                      <?php } ?>
                    </select>
                </div>

                <div class="input-group cboSalida" style="margin-top:3%">
                    <span class="input-group-addon">Solicitante</span>
                    <input type="text" name="solicitante" id="solicitante" class="form-control" required>
                </div>

                <div class="input-group cboEntrada">
                    <span class="input-group-addon">Entidad</span>
                    <select name="id_ent" id="id_ent" class="form-control" required>
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($entidad as $obj){ ?>
                      <option value="<?php echo $obj->id_ent; ?>"><?php echo $obj->desc_ent; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Factura</span>
                    <input type="text" name="fac_mov" id="fac_mov" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Fecha</span>
                    <input type="text" name="fecha_mov" id="fecha_mov" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <h4>Productos</h4>
            </div>

            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Producto</span>
                        <select name="" id="id_pro" class="form-control" style="width:100%; padding:0px; height:0px">
                          <option value="">.::Seleccione::.</option>
                          <?php foreach($producto as $obj){ ?>
                          <option value="<?php echo $obj->id_pro; ?>"><?php echo $obj->desc_pro; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Uni. Med.</span>
                        <select name="" id="id_uni" class="form-control">
                          <option value="">.::Seleccione::.</option>
                          <?php foreach($unidad_medida as $obj){ ?>
                          <option value="<?php echo $obj->id_uni; ?>"><?php echo $obj->desc_uni; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Prec. Uni.(S/)</span>
                        <input type="text" id="pre_uni" name="" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Cantidad</span>
                        <input type="text" id="cant_pro" name="" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-2">
                  <center><a class="btn btn-success btn-sm" id="putProducto">Agregar</a></center>
                </div>

                <div class="col-md-12">
                  <table id="list-producto" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Descripción</th>
                        <th style="width: 130px;">Unidad de Medida</th>
                        <th style="width: 180px;">Prec. Uni. (S/)</th>
                        <th style="width: 180px;">Cantidad</th>
                        <th style="width: 70px;">Quitar</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>


          </div>
        </div>

          <div class="modal-footer clearfix">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

            <button type="submit" class="btn btn-success" id="btnRealizar" data-e="R" data-loading-text="Procesando...<i class='fa fa-refresh fa-spin'></i>"><i class="fa fa-check"></i> Realizar</button>
          </div>
      </form>
    </div>
  </div>
</div>