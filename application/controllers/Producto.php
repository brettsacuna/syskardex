<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Producto_model");
	}

	public function index()
	{
		$this->addJs("producto.js");
		$this->addJs("producto.form.js");

		$concepto = $this->db->from("concepto_general")->where("estado", "A")->get()->result();
		$this->setTempleate("productos", "producto/index", array("concepto"=>$concepto), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Producto_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_pro");
			$response = $this->Producto_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_pro");
			$response = $this->Producto_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('producto', array('desc_pro', 'desc_con', 'cuenta_contable', 'clasificador', 'stock_pro', 'id_pro'), 'id_pro', array("concepto_general", "producto.id_con = concepto_general.id_con"), '', array("producto.estado", 'A'));
		echo $result;
	}
}
