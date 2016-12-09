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

	public function generate(){
		$this->load->library('pdf_reports');

		$this->pdf = new Pdf_reports();

		$this->pdf->AddPage('P');
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("REPORTE MOVIMIENTO");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(200,200,200);

		$cabecera = $this->Movimiento_model->get_cabecera($this->input->get('movimiento'));

		$this->pdf->SetFont('Arial', 'UI', 11);
		$this->pdf->Cell(180,10,"PEDIDO COMPROBANTE DE ".($cabecera[0]->id_tmov == 1 ? 'ENTRADA' : 'SALIDA')." - ".str_pad($cabecera[0]->id_mov, 6, "0", STR_PAD_LEFT),0,0,'C');
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial', 'UB', 10);
		$this->pdf->Cell(40,7,"PROCEDENCIA : ",0,0,'R');
		$this->pdf->Cell(5);
		$this->pdf->SetFont('Arial', '', 10);
		$this->pdf->Cell(80,7,strtoupper($cabecera[0]->desc_proc),0,0,'L');
		$this->pdf->Cell(5);
		$this->pdf->SetFont('Arial', 'UB', 10);
		$this->pdf->Cell(20,7,"FECHA MOV. : ",0,0,'R');
		$this->pdf->Cell(5);
		$this->pdf->SetFont('Arial', '', 10);
		$this->pdf->Cell(25,7,date('d/m/y', strtotime($cabecera[0]->fecha_mov)),0,0,'R');
		$this->pdf->Ln(7);
		$this->pdf->SetFont('Arial', 'UB', 10);
		$this->pdf->Cell(40,7,"DOC. REFERENCIA : ",0,0,'R');
		$this->pdf->Cell(5);
		$this->pdf->SetFont('Arial', '', 10);
		$this->pdf->Cell(40,7,$cabecera[0]->fac_mov,0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->SetFont('Arial', 'UB', 10);
		$this->pdf->Cell(40,7,"SOLICITANTE : ",0,0,'R');
		$this->pdf->Cell(5);
		$this->pdf->SetFont('Arial', '', 10);
		$this->pdf->Cell(80,7,strtoupper($cabecera[0]->solicitante),0,0,'L');
		$this->pdf->Ln(15);

        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(10,7,'Item','TBLR',0,'C','1');
        $this->pdf->Cell(60,7,utf8_decode('Denominación'),'TBLR',0,'C','1');
        $this->pdf->Cell(20,7,'Unidad','TBLR',0,'C','1');
        $this->pdf->Cell(30,7,'Clasificador','TBLR',0,'C','1');
        $this->pdf->Cell(20,7,'Cantidad','TBLR',0,'C','1');
        $this->pdf->Cell(20,7,'Precio','TBLR',0,'C','1');
        $this->pdf->Cell(20,7,'Valor','TBLR',0,'C','1');
	    $this->pdf->Ln(7);

		$detalle = $this->Movimiento_model->get_detalle($this->input->get('movimiento'));
        $i = 1;

        foreach ($detalle as $producto) {
			$this->pdf->SetFont('Arial', '', 8);
			$this->pdf->SetCellRect(true);
			$this->pdf->SetWidths(array(10,60,20,30,20,20,20));
			$this->pdf->SetHeight(7);
			$this->pdf->SetAligns(array('C','J','C','C','R','R','R'));
			$this->pdf->Row(array($i, strtoupper(utf8_decode($producto->desc_pro)),$producto->desc_uni,$producto->clasificador,number_format($producto->cant_pro, 2, '.', ','),number_format($producto->pre_uni, 2, '.', ','),number_format(($producto->cant_pro * $producto->pre_uni), 2, '.', ',')));

			$i += 1;
        }

		$this->pdf->ln(70);
	    $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->cell(60,5,"_________________________________",'',0,'L',0);
        $this->pdf->cell(60);
        $this->pdf->cell(60,5,"_________________________________",'',0,'L',0);
        $this->pdf->ln(5);
	    $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->cell(60,5,utf8_decode("V° B°"),'',0,'C',0);
        $this->pdf->cell(60);
        $this->pdf->cell(60,5,"SOLICITANTE",'',0,'C',0);

		$this->pdf->Output("Visualizar_movimiento_".date('YmdHis').".pdf", 'D');
	}
}
