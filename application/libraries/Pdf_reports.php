<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	require_once APPPATH."third_party/fpdf/fpdf.php";

	class Pdf_reports extends FPDF{
		var $widths;
		var $aligns;
		var $cell_rect;
		var $height;

		public function __construct(){
			parent::__construct();
		}

		public function Header(){
			$this->SetFont('Arial','B',13);
            $this->Cell(190,10,'SISTEMA DE ALMACEN',0,0,'C');
            $this->Ln('15');
		}

		public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
      	}

      	public function SetWidths($w){
		    $this->widths=$w;
		}

		public function SetAligns($a){
		    $this->aligns=$a;
		}

		public function SetCellRect($r){
			$this->cell_rect=$r;
		}

		public function SetHeight($h){
			$this->height=$h;
		}

		public function Row($data){
		    $nb=0;
		    for($i=0;$i<count($data);$i++)
		        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		    $h=(isset($this->height) ? $this->height : 7)*$nb;
		    $this->CheckPageBreak($h);
		    for($i=0;$i<count($data);$i++)
		    {
		        $w=$this->widths[$i];
		        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		        $x=$this->GetX();
		        $y=$this->GetY();
		        (isset($this->cell_rect) && $this->cell_rect == true) ? $this->Rect($x,$y,$w,$h) : false;
		        $this->MultiCell($w,(isset($this->height) ? $this->height : 5),$data[$i],0,$a);
		        $this->SetXY($x+$w,$y);
		    }

		    $this->Ln($h);
		}

		public function CheckPageBreak($h){
		    if($this->GetY()+$h>$this->PageBreakTrigger)
		        $this->AddPage($this->CurOrientation);
		}

		public function NbLines($w,$txt){
		    $cw=&$this->CurrentFont['cw'];
		    if($w==0)
		        $w=$this->w-$this->rMargin-$this->x;
		    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		    $s=str_replace("\r",'',$txt);
		    $nb=strlen($s);
		    if($nb>0 and $s[$nb-1]=="\n")
		        $nb--;
		    $sep=-1;
		    $i=0;
		    $j=0;
		    $l=0;
		    $nl=1;
		    while($i<$nb)
		    {
		        $c=$s[$i];
		        if($c=="\n")
		        {
		            $i++;
		            $sep=-1;
		            $j=$i;
		            $l=0;
		            $nl++;
		            continue;
		        }
		        if($c==' ')
		            $sep=$i;
		        $l+=$cw[$c];
		        if($l>$wmax)
		        {
		            if($sep==-1)
		            {
		                if($i==$j)
		                    $i++;
		            }
		            else
		                $i=$sep+1;
		            $sep=-1;
		            $j=$i;
		            $l=0;
		            $nl++;
		        }
		        else
		            $i++;
		    }
		    return $nl;
		}
	}
?>
