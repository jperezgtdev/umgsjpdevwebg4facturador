<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class DetalleModel extends CI_Model{
    //inicializamos los valores del constructor
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    //funcion insertar
    public function insertar($detalle_data){
        $this->db->insert('detalle', $detalle_data);
    }
}
?>