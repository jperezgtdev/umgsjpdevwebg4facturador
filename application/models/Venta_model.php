<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_model extends CI_Model{
//inicializamos el constructor
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
//funcion para insertar datos
    public function insertar($data){
        $this->db->insert('venta', $data);
        $venta_id = $this->db->insert_id(); // Obtiene el ID generado durante la última inserción
        return $venta_id;
    }
}