<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productoModel extends CI_Model {

    public function agregarProducto($nombre, $stock, $prov) {
        $data = array(
            'Producto_nombre' => $nombre,
            'Producto_stock' => $stock,
            'Producto_Proveedor_id' => $prov
        );

        return $this->db->insert('Producto', $data);
    }
    public function getProductoData(){
		$this->db->select('Producto_id,Producto_nombre,Producto_stock,Producto_Proveedor_id');
		$this->db->from('Producto'); 
 		$query = $this->db->get();
		return $query->result();
	}
    public function sendProductos(){
        $this->db->select('Producto_id,Producto_nombre');
		$this->db->from('Producto'); 
 		$query = $this->db->get();
		return $query->result();
    }
}
?>