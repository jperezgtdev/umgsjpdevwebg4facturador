<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedorModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertarProveedor($nombre, $direccion, $telefono) {
        $data = array(
            'nombre' => $nombre,
            'direccion' => $direccion,
            'telefono' => $telefono
        );

        $this->db->insert('proveedores', $data); // Asegúrate de que 'proveedores' sea el nombre correcto de tu tabla
        return $this->db->affected_rows() > 0;
    }

    public function insertarPedido($idProveedor, $fecha, $descripcion) {
        $data = array(
            'id_proveedor' => $idProveedor,
            'fecha' => $fecha,
            'descripcion' => $descripcion
        );

        $this->db->insert('pedidos', $data); // Asegúrate de que 'pedidos' sea el nombre correcto de tu tabla
        return $this->db->affected_rows() > 0;
    }
}
?>
