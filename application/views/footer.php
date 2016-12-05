               </div><!-- /.col -->
            </div><!-- /.row -->
         </div><!-- /.main-content -->
      </div><!-- /.main-container -->


		<div id="carga" style="  z-index: 3000;background: rgba(255,255,255,0.7); border-radius: 3px; position: fixed;  top: 0;  left: 0;  width: 100%;  height: 100%; display:none">
        	<i class="fa fa-refresh fa-spin" style="position: fixed;  top: 50%;  left: 50%;  margin-left: -15px;  margin-top: -15px;  color: #000;  font-size: 30px;"></i>
    	</div>

      <script src="<?php echo base_url()?>public/lib/assets/js/jquery-2.1.4.min.js"></script>
    	<script src="<?php echo base_url()?>public/lib/plugins/bootstrap-sweetalert-master/lib/sweet-alert.min.js"></script>

    	<script src="<?php echo base_url()?>public/lib/functions.js"></script>

    	<?php foreach($lib_js as $key => $value){ ?>
	  	<script type="text/javascript" src="<?php echo $value ?>"></script>
	  	<?php } ?>
	</body>
</html>