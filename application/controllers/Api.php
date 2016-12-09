<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH . '/libraries/REST_Controller.php';

	Class Api extends REST_Controller {
		public function __construct() {
	        parent::__construct();
	        $this->load->model(array('Producto_model'));
	    }

	    public function index_get() {
            header("Access-Control-Allow-Origin: *");

	    	$this->response(array('products' => $this->Producto_model->get_productos($this->input->get('filtro'))), REST_Controller::HTTP_OK);
	    }
	}
