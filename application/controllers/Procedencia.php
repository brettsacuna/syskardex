<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedencia extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Procedencia_model");
	}

	public function index()
	{
		$this->addJs("procedencia.js");
		$this->addJs("procedencia.form.js");
		$this->setTempleate("Procedencias", "procedencia/index", array(), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Procedencia_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_proc");
			$response = $this->Procedencia_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_proc");
			$response = $this->Procedencia_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('procedencia', array('desc_proc', 'id_proc'), 'id_proc', '', '', array("estado", 'A'));
		echo $result;
	}
}
