<!DOCTYPE html>
<html>
	
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $title ?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/lib/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/lib/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/lib/assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/lib/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>public/lib/assets/css/ace-rtl.min.css" />

		<link rel="stylesheet" href="<?php echo base_url()?>public/lib/plugins/bootstrap-sweetalert-master/lib/sweet-alert.css">

	  <?php foreach($lib_css as $value){ ?>
	  <link rel="stylesheet" href="<?php echo $value ?>">
	  <?php } ?>

	  <style>
		.input-group-addon {
		    background: #E7EBEF !important;
		}

		/*button{
			border-radius:0px !important;
		}

		table.dataTable>tbody>tr.child ul{
			width:100%;
		}*/

		.jqte_tool_text {
			height:25px;
		}
	  </style>
	</head>

<body class="<?php if(isset($class_body)){echo $class_body;} ?>" option='<?php echo @$_GET['option']?>'>
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
