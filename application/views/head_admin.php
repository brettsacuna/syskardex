<?php /**@author : Israel A. Flores García <Isxflogar> <isflogar0103@gmail.com>**/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title ?></title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url()?>public/lib/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>public/lib/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?=base_url()?>public/lib/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?=base_url()?>public/lib/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?=base_url()?>public/lib/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?=base_url()?>public/lib/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>public/lib/assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?=base_url()?>public/lib/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<link rel="stylesheet" href="<?=base_url()?>public/lib/animate.min.css">
	  	<link rel="stylesheet" href="<?=base_url()?>public/lib/plugins/select2/select2.min.css">

	  	<link rel="stylesheet" href="<?=base_url()?>public/lib/plugins/bootstrap-sweetalert-master/lib/sweet-alert.css">
		<link rel="stylesheet" href="<?=base_url()?>public/lib/plugins/datepicker/datepicker3.css">

		<?php foreach($lib_css as $value){ ?>
		<link rel="stylesheet" href="<?php echo $value ?>">
		<?php } ?>

		<!-- ace settings handler -->
		<script src="<?=base_url()?>public/lib/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?=base_url()?>public/lib/assets/js/html5shiv.min.js"></script>
		<script src="<?=base_url()?>public/lib/assets/js/respond.min.js"></script>
		<![endif]-->

		<style>
		.input-group-addon {
		    background: #E7EBEF !important;
		}

		button{
			border-radius:0px !important;
		}

		table.dataTable>tbody>tr.child ul{
			width:100%;
		}

		.jqte_tool_text {
			height:25px;
		}

		[data-notify="progressbar"] {
			margin-bottom: 0px;
			position: absolute;
			bottom: 0px;
			left: 0px;
			width: 100%;
			height: 5px;
		}



		/*CUSTOM NOTIFICATIONS */
		.alert-minimalist {
			background-color: rgb(241, 242, 240);
			border-color: rgba(149, 149, 149, 0.3);
			border-radius: 3px;
			color: rgb(149, 149, 149);
			padding: 10px;
		}
		.alert-minimalist > [data-notify="icon"] {
			height: 50px;
			margin-right: 12px;
		}
		.alert-minimalist > [data-notify="title"] {
			color: rgb(51, 51, 51);
			display: block;
			font-weight: 700;
			margin-bottom: 5px;
		}
		.alert-minimalist > [data-notify="message"] {
			font-size: 80%;
		}

		@import url(http://fonts.googleapis.com/css?family=Old+Standard+TT:400,700);
		[data-notify="container"][class*="alert-pastel-"] {
			background-color: rgb(255, 255, 238);
			border-width: 0px;
			border-left: 15px solid rgb(255, 240, 106);
			border-radius: 0px;
			box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
			font-family: 'Old Standard TT', serif;
			letter-spacing: 1px;
		}
		[data-notify="container"].alert-pastel-info {
			border-left-color: rgb(255, 179, 40);
		}
		[data-notify="container"].alert-pastel-danger {
			border-left-color: rgb(255, 103, 76);
		}
		[data-notify="container"][class*="alert-pastel-"] > [data-notify="title"] {
			color: rgb(80, 80, 57);
			display: block;
			font-weight: 700;
			margin-bottom: 5px;
		}
		[data-notify="container"][class*="alert-pastel-"] > [data-notify="message"] {
			font-weight: auto;
		}

        .datepicker{z-index:1151 !important;}

		.ace-settings-container{
			display: none;
		}
	  </style>
	</head>

	<body class="skin-3 no-skin" option='<?php echo @$_GET['option']?>'>
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url() ?>public/lib/assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php echo $fullname_usu; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li style="display:none">
									<a href="javascript:void(0)">
										<i class="ace-icon fa fa-cog"></i>
										Configuración
									</a>
								</li>

								<!--<li class="divider"></li>-->

								<li>
									<a href="<?php echo base_url(); ?>admin/salir">
										<i class="ace-icon fa fa-power-off"></i>
										salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state compact">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<?php if(count($menu)>0){
		            foreach($menu as $option_padre){
		            	if($option_padre->id_padre == 0 && $option_padre->alone == 0){
		            ?>
		            <li class="hover pull_up">
		            	<a href="javascript:void(0)" class="dropdown-toggle">
		              		<i class="menu-icon <?php echo $option_padre->icon; ?>"></i>
		              		<span class="menu-text"><?php echo $option_padre->name_mod; ?></span>
		              		<b class="arrow fa fa-angle-down"></b>
		              	</a>
						<b class="arrow"></b>
		              	<ul class="submenu">
		            <?php
		             	foreach($menu as $option_hijo){
		             	 	if($option_hijo->id_padre == $option_padre->id_mod){
		            ?>
		                	<li class="hover">
		                		<a href="<?php echo base_url().$option_hijo->url; ?>"><?php echo $option_hijo->name_mod; ?></a>
		                	</li>
		            <?php
		             		}
		             	}
		            ?>
		              	</ul>
		            </li>
		            <?php
		            	}elseif($option_padre->id_padre == 0 && $option_padre->alone == 1){
		            ?>
							<li class="hover pull_up">
								<a href="<?php echo base_url().$option_padre->url;?>">
									<i class="menu-icon <?php echo $option_padre->icon?>"></i>
									<span class="menu-text"><?php echo $option_padre->name_mod;?></span>
								</a>
							</li>
		            <?php
		            	}
		              }
		            } ?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div><!--FIN SIDEBAR-->
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
