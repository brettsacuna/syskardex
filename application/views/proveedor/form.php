<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" ><span>Registrar</span> Proveedor</h4>
      </div>

      <form id='formProveedor' method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_prov" name="id_prov" value="">
                    <span class="input-group-addon">Descripción</span>
                    <input name="desc_prov" type="text" class="form-control" id="desc_prov" required="">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Dirección</span>
                    <input name="dir_prov" type="text" class="form-control" id="dir_prov" required="">
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                    <input type="hidden" id="id_prov" name="id_prov" value="">
                    <span class="input-group-addon">Teléfono</span>
                    <input name="tel_prov" type="text" class="form-control" id="tel_prov" required="">
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