<?php
class Reporte_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_categorias() {
        $conceptos = $this->db->get('concepto_general')->result();

        $conceptos_combinados = array();

    	foreach ($conceptos as $concepto) {
    		$aux = array_merge((array)$concepto, array('productos' => $this->get_productos_categoria($concepto->id_con)));

    		array_push($conceptos_combinados, $aux);
    	}

    	return $conceptos_combinados;
    }

    private function get_productos_categoria($categoria) {
        return $this->db->get_where('producto', array('id_con' => $categoria))->result();
    }
}
?>
