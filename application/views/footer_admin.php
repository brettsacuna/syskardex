					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"><?php echo date("Y"); ?></span>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->


		<div id="carga" style="  z-index: 3000;background: rgba(255,255,255,0.7); border-radius: 3px; position: fixed;  top: 0;  left: 0;  width: 100%;  height: 100%; display:none">
        	<i class="fa fa-refresh fa-spin" style="position: fixed;  top: 50%;  left: 50%;  margin-left: -15px;  margin-top: -15px;  color: #000;  font-size: 30px;"></i>
    	</div>


		<script src="<?php echo base_url();?>public/lib/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url();?>public/lib/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>public/lib/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>public/lib/assets/js/ace.min.js"></script>


		<script src="<?php echo base_url();?>public/lib/jquery.numeric.js"></script>

    	<script src="<?php echo base_url();?>public/lib/plugins/bootstrap-notify-master/bootstrap-notify.min.js"></script>

    	<script src="<?php echo base_url();?>public/lib/plugins/bootstrap-sweetalert-master/lib/sweet-alert.min.js"></script>

    	<script src="<?php echo base_url();?>public/lib/plugins/datepicker/bootstrap-datepicker.js"></script>

    	<script src="<?php echo base_url();?>public/lib/plugins/datepicker/bootstrap-datepicker.js"></script>

    	<script src="<?php echo base_url();?>public/lib/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>

    	<script src="<?php echo base_url();?>public/lib/plugins/select2/select2.full.min.js"></script>

    	<script src="<?php echo base_url();?>public/lib/functions.js"></script>

    	<script>
			var url_aplication = "<?php echo base_url();?>";
			var w = $(window).height();
			w = w*0.7;

			/*menu = $("body").attr("option");
			if(menu==="" || menu===undefined){
				menu = "00";
			}

			$("#option"+menu).addClass('active');*/

			var param = {
				"scrollCollapse": true,
				"scrollY":        "600px",
		        "lengthMenu": [[10, 30, 60, 100], [10, 30, 60, 100]],
		        "language": {
		            "lengthMenu": " _MENU_",
		             "zeroRecords": "No hay registros",
		             "info": "",
		                "info": "Pagina _PAGE_ de _PAGES_",
		                //"info": "<buton type='button' class='btn btn-sm btn-success' title='Exportar a un archivo Excel'><i class='fa fa-file-excel-o'></i></buton>",
		             "infoEmpty": "Registro no encontrado",
		             "infoFiltered": "(buscado en _MAX_ registros)",
		             "search":         "Buscar: ",
		             "paginate": {
		                "first":      "First",
		                "last":       "Last",
		                "next":       "<i class='fa fa-angle-double-right'></i>",
		                "previous":   "<i class='fa fa-angle-double-left'></i>"
		            },
		        },
		        "bProcessing": false,
				"bServerSide": true,
				"sAjaxSource": "",
				"sPaginationType": "full_numbers",
				"fnServerData" : ""
		    };

		    console.log(w);

		    $(".modal").modal({"show": false, backdrop: 'static', keyboard: false});
		</script>

    	<?php foreach($lib_js as $key => $value){ ?>
	  	<script type="text/javascript" src="<?php echo $value; ?>"></script>
	  	<?php } ?>
	</body>
</html>