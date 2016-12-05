<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_ControllerBase {
   function __construct(){
      parent::__construct();
      $this->load->model('Reporte_model');
   }

   public function index()
   {
      $this->addJs("reporte.js");

      $alto = $this->db->from("producto")->where("stock_pro >", 10)->where("estado", "A")->get()->result();

      $medio = $this->db->from("producto")->where("stock_pro <=", 10)->where("stock_pro >", 0)->where("estado", "A")->get()->result();

      $nada = $this->db->from("producto")->where("stock_pro", 0)->where("estado", "A")->get()->result();

      $this->setTempleate("Reporte", "reporte/index", array("alto"=>$alto, "medio"=>$medio, "nada"=>$nada), 3);
   }

   function getMovimientos(){
      if($this->input->is_ajax_request() && $this->input->method(TRUE)=='POST'){
         $id_pro = $this->input->post("id_pro");
         $Datos = $this->db->from("det_movimiento")
         ->join("movimiento", "det_movimiento.id_mov = movimiento.id_mov")
         ->join("tipo_movimiento", "movimiento.id_tmov = tipo_movimiento.id_tmov")
         ->join("unidad_medida", "det_movimiento.id_uni = unidad_medida.id_uni")
         ->join("producto", "det_movimiento.id_pro = producto.id_pro")
         ->where("det_movimiento.id_pro", $id_pro)
         ->where("movimiento.estado", "A")
         ->get()->result();

         echo json_encode($Datos);
      }else{
         redirect($this->base_url."admin", "refresh");
      }
   }

   function print_stock_productos() {
       $this->load->library('pdf_reports');

       $this->pdf = new Pdf_reports();

    	$this->pdf->AddPage('P');
    	$this->pdf->AliasNbPages();
        $this->pdf->SetTitle("REPORTE STOCKS DE PRODUCTOS");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(200,200,200);

        $this->pdf->SetFont('Arial', 'UI', 11);
        $this->pdf->Cell(180,10,"REPORTE DE STOCK DE PRODUCTOS",0,0,'C');
        $this->pdf->Ln(15);

        $this->pdf->SetFont('Arial', 'B', 8);
        $this->pdf->Cell(10,7,'Item','TBLR',0,'C','1');
        $this->pdf->Cell(100,7,utf8_decode('Descripción'),'TBLR',0,'C','1');
        $this->pdf->Cell(25,7,'Stock','TBLR',0,'C','1');
        $this->pdf->Cell(45,7,'Estado','TBLR',0,'C','1');
	    $this->pdf->Ln(7);

        $categorias = $this->Reporte_model->get_categorias();
        $i = 1;
        foreach ($categorias as $categoria) {
            $this->pdf->SetFont('Arial', 'B', 8);
            $this->pdf->Cell(180,7,strtoupper(utf8_decode($categoria['desc_con'])),'TBLR',0,'C',0);
            $this->pdf->Ln(7);

            if (count($categoria['productos']) == 0) {
                $this->pdf->SetFont('Arial', '', 8);
                $this->pdf->Cell(180,7,utf8_decode('No se encontraron productos registrados con este concepto'),'TBLR',0,'C',0);
                $this->pdf->Ln(7);
            } else {
                foreach ($categoria['productos'] as $producto) {
                    $this->pdf->SetFont('Arial', '', 8);
                    $this->pdf->SetCellRect(true);
                    $this->pdf->SetWidths(array(10,100,25,45));
                    $this->pdf->SetHeight(7);
        		    $this->pdf->SetAligns(array('C','J','C','C'));
        		    $this->pdf->Row(array($i, strtoupper(utf8_decode($producto->desc_pro)),number_format($producto->stock_pro, 2, '.', ','),($producto->estado == 'I' ? 'INACTIVO' : 'ACTIVO')));

                    $i += 1;
                }
            }
        }

        $this->pdf->Output("Reporte_stock_productos_".date('YmdHis').".pdf", 'D');
   }
}
