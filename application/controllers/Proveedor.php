<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Proveedor_model");
	}

	public function index()
	{
		$this->addJs("proveedor.js");
		$this->addJs("proveedor.form.js");
		$this->setTempleate("Proveedores", "proveedor/index", array(), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Proveedor_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_prov");
			$response = $this->Proveedor_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_prov");
			$response = $this->Proveedor_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('proveedor', array('desc_prov', 'dir_prov', 'tel_prov', 'id_prov'), 'id_prov', '', '', array("estado", 'A'));
		echo $result;
	}
}
