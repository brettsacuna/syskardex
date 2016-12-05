<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimiento extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
		$this->load->model("Movimiento_model");
	}

	public function index()
	{
		$this->addJs("movimiento.js");
		$this->addJs("movimiento.form.js");

		$tipo_movimiento = $this->db->from("tipo_movimiento")->get()->result();
		$procedencia = $this->db->from("procedencia")->where("estado", "A")->get()->result();
		$entidad = $this->db->from("entidad")->where("estado", "A")->get()->result();
		$unidad_medida = $this->db->from("unidad_medida")->where("estado", "A")->get()->result();
		$producto = $this->db->from("producto")->where("estado", "A")->get()->result();

		$this->setTempleate("Movimientos ( Entrada - Salida )", "movimiento/index", array("tipo_movimiento"=>$tipo_movimiento, "procedencia"=>$procedencia, "unidad_medida"=>$unidad_medida, "producto"=>$producto, "entidad"=>$entidad), 3);
	}

	public function process(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$data = $this->input->post();
			$response = $this->Movimiento_model->process($data);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function delete(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_mov");
			$response = $this->Movimiento_model->delete($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function get(){
		if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
			$key = (int)$this->input->post("id_mov");
			$response = $this->Movimiento_model->get($key);
			echo json_encode($response);
		}else{
			redirect($this->base_url."admin", "refresh");
		}
	}

	public function grilla(){
		$result = $this->datatables->getData('movimiento', array('desc_tmov', 'fac_mov', 'fecha_mov', 'id_mov'), 'id_mov', array("tipo_movimiento", "movimiento.id_tmov = tipo_movimiento.id_tmov"), array("procedencia", "movimiento.id_proc = procedencia.id_proc"), array("movimiento.estado", 'A'));
		echo $result;
	}
}
