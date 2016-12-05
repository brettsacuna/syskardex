<?php
class Movimiento_model extends CI_Model {
	private $table = "movimiento";
	private $key_table = "id_mov";

    public function __construct()
    {
        parent::__construct();
    }

    public function process($data){
    	$data[$this->key_table] = (int)$data[$this->key_table];
    	$this->db->trans_begin();
        $type = "";

    	if($data[$this->key_table]==0){
	    	unset($data[$this->key_table]);
            $fecha_hora_reg = date("Y-m-d H:i:s");
	    	$data["estado"] = "A";
	    	$this->db->insert($this->table, array(
                "id_tmov"=>$data["id_tmov"],
                "fecha_mov"=>$data["fecha_mov"],
                "id_proc"=>$data["id_proc"],
                "solicitante"=>$data["solicitante"],
                "fac_mov"=>$data["fac_mov"],
                "id_ent"=>$data["id_ent"],
                "estado"=>"A"
            ));
            $id_mov = $this->db->insert_id();
            $type = "I";
	    }else{
            $Movimiento = $this->db->from("movimiento")->where("id_mov", $data[$this->key_table])->get()->result();
            $tipo_movimiento = $Movimiento[0]->id_tmov;

            $DetMovimiento = $this->db->from("det_movimiento")->where("id_mov", $data[$this->key_table])->get()->result();

            foreach ($DetMovimiento as $obj) {
                $Producto = $this->db->from("producto")->where("id_pro", $obj->id_pro)->get()->result();
                $Producto = $Producto[0];
                $stock_pro = $Producto->stock_pro;
                $stock_db = $obj->cant_ent;

                if($tipo_movimiento==1){
                    $stock_new = $stock_pro - $stock_db;
                }else{
                    $stock_new = $stock_pro + $stock_db;
                }

                $this->db->where("id_pro", $obj->id_pro);
                $this->db->update("producto", array("stock_pro"=>$stock_new));
            }

            $this->db->where("id_mov", $data[$this->key_table]);
            $this->db->delete("det_movimiento");

	    	$this->db->where($this->key_table, $data[$this->key_table]);
	    	$this->db->update($this->table, array(
                "id_tmov"=>$data["id_tmov"],
                "fecha_mov"=>$data["fecha_mov"],
                "id_proc"=>$data["id_proc"],
                "solicitante"=>$data["solicitante"],
                "fac_mov"=>$data["fac_mov"],
                "id_ent"=>$data["id_ent"]
            ));

            $id_mov = $data[$this->key_table];
            $type = "U";
        }
        $tipo_movimiento = $data["id_tmov"];
        //1 entrada, 2 salida
	    $row = $this->rowData($this->table, $this->key_table, $id_mov);

        for($i=0; $i<count($data["producto"]); $i++){
            $Producto = $this->db->from("producto")->where("id_pro", $data["producto"][$i])->get()->result();
                $Producto = $Producto[0];

            $UnidadMedida = $this->db->from("unidad_medida")->where("id_uni", $data["unidad-medida"][$i])->get()->result();
                $UnidadMedida = $UnidadMedida[0];

            if($Producto->stock_pro == null){
                $stock_act  = 0;
            }else{
                $stock_act  = $Producto->stock_pro;
            }

            $cant_ent = $UnidadMedida->cant_uni*$data["cantidad"][$i];
            if($tipo_movimiento==2){
                if($cant_ent > $stock_act){
                    $Producto = $this->db->from("producto")->where("id_pro", $data["producto"][$i])->get()->result();
                    $Producto = $Producto[0];

                    $this->db->trans_rollback();
                    return array("result" => false, "msg" =>  "No hay mas stock : El producto ".$Producto->desc_pro." solo tiene ".$stock_act." en almacen", "data" => "");
                }else{
                    $stock_res = $stock_act - $cant_ent;
                }
            }else{
                $stock_res = $stock_act + $cant_ent;
            }

                //$data["cant-ent"]
                //$data["stock-act"]
                //$data["stock-res"]

            $this->db->insert("det_movimiento", array(
                "id_mov" => $id_mov,
                "id_pro" => $data["producto"][$i],
                "id_uni" => $data["unidad-medida"][$i],
                "cant_pro" => $data["cantidad"][$i],
                "pre_uni" => $data["precio"][$i],
                "stock_act" => $stock_act,
                "cant_ent" => $cant_ent,
                "stock_res" => $stock_res
                    //"stock-fis-ant" => $data["stock-fis-ant"],
                    //"stock-val-ant" => $data["stock-val-ant"],
                    //"stock-fis-act" => $data["stock-fis-act"],
                    //"stock-val-act" => $data["stock-val-act"]
            ));

            $this->db->where("id_pro", $data["producto"][$i]);
            $this->db->update("producto", array("stock_pro"=>$stock_res));
        }

	    if ($this->db->trans_status() === TRUE)
		{
		    $this->db->trans_commit();
		    $response = ["result" => true, "msg" => "", "data" => $row];
		}else{
		    $this->db->trans_rollback();
		    $response = ["result" => false, "msg" =>  $this->db->_error_message(), "data" => ""];
		}

		return $response;
    }

    public function delete($key){
    	$this->db->trans_begin();

    	$this->db->where($this->key_table, $key);
    	$this->db->update($this->table, array("estado"=>"I"));
    	$row = $this->rowData($this->table, $this->key_table, $key);

    	if ($this->db->trans_status() === TRUE)
		{
		    $this->db->trans_commit();
		    $response = ["result" => true, "msg" => "", "data" => $row];
		}else{
		    $this->db->trans_rollback();
		    $response = ["result" => false, "msg" =>  $this->db->_error_message(), "data" => ""];
		}

		return $response;
    }

    public function get($key){
    	$row = $this->rowData($this->table, $this->key_table, $key);
      $DetMovimiento = $this->db->from("det_movimiento")
      ->join("producto", "det_movimiento.id_pro = producto.id_pro")
      ->join("unidad_medida", "det_movimiento.id_uni = unidad_medida.id_uni")
      ->where("det_movimiento.id_mov", $key)
      ->get()->result();
    	return array("Movimiento"=>$row, "DetMovimiento"=>$DetMovimiento);
    }
}
?>