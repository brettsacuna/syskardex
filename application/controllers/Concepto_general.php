<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Concepto_general extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Concepto_general_model");
	}

	public function index()
	{
		$this->addJs("concepto_general.js");
		$this->addJs("concepto_general.form.js");
		$this->setTempleate("Conceptos Generales", "concepto_general/index", array(), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Concepto_general_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_con");
			$response = $this->Concepto_general_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_con");
			$response = $this->Concepto_general_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('concepto_general', array('desc_con', 'id_con'), 'id_con', '', '', array("estado", 'A'));
		echo $result;
	}
}
