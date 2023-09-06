<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketModel extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function getDetalle(){
		$this->db->select('detalle_Venta_id, detalle_Producto_id, detalle_descripcion, detalle_cantidad, detalle_precioUnitario');
		$this->db->from('detalle'); 
        $this->db->order_by('detalle_Venta_id, detalle_Producto_id');
		$query = $this->db->get();
		return $query->result();
	}

    public function buscar_detalle_venta_por_factura($detalle_Venta_id) {
        $this->db->select('*');
        $this->db->select('detalle_Venta_id, detalle_Producto_id, detalle_descripcion, detalle_cantidad, detalle_precioUnitario');
		$this->db->from('detalle'); 
        $this->db->where('detalle_Venta_id, detalle_Producto_id', $detalle_Venta_id); 
        return $query->result();
    }


}