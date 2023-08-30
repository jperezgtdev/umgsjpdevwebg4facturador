<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertarVenta($venta_data) {
        // Inserta los datos de venta en la tabla 'venta'
        $this->db->insert('venta', $venta_data);
        return $this->db->insert_id();
    }

    public function insertarDetalleVenta($detalle_data) {
        // Inserta los datos de detalle de venta en la tabla 'detalle_venta'
        $this->db->insert('detalle_venta', $detalle_data);
    }

    public function getProductos() {
        // Obtén los datos de productos desde la tabla 'productos'
        $query = $this->db->get('productos');
        return $query->result();
    }
}
