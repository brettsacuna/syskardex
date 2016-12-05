<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entidad extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Entidad_model");
	}

	public function index()
	{
		$this->addJs("entidad.js");
		$this->addJs("entidad.form.js");
		$this->setTempleate("Entidades", "entidad/index", array(), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Entidad_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_ent");
			$response = $this->Entidad_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_ent");
			$response = $this->Entidad_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('entidad', array('desc_ent', 'id_ent'), 'id_ent', '', '', array("estado", 'A'));
		echo $result;
	}
}
