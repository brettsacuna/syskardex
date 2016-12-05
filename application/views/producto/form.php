<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Producto</h4>
      </div>

      <form id='formProducto' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_pro" name="id_pro" value="">
                    <span class="input-group-addon">Descripción</span>
                    <input name="desc_pro" type="text" class="form-control" id="desc_pro" required="">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Concepto</span>
                    <select name="id_con" id="id_con" class="form-control">
                      <option value="">.::Seleccione::.</option>
                      <?php foreach($concepto as $obj){ ?>
                      <option value="<?php echo $obj->id_con; ?>"><?php echo $obj->desc_con; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Cta. Contable</span>
                    <input name="cuenta_contable" type="text" class="form-control" id="cuenta_contable" required="">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Clasificador</span>
                    <input name="clasificador" type="text" class="form-control" id="clasificador" required="">
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