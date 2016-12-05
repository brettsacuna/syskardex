<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidad_medida extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Unidad_medida_model");
	}

	public function index()
	{
		$this->addJs("unidad_medida.js");
		$this->addJs("unidad_medida.form.js");
		$this->setTempleate("Unidad de Medida", "unidad_medida/index", array(), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Unidad_medida_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_uni");
			$response = $this->Unidad_medida_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_uni");
			$response = $this->Unidad_medida_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('unidad_medida', array('desc_uni', 'cant_uni', 'id_uni'), 'id_uni', '', '', array("estado", 'A'));
		echo $result;
	}
}
