<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class clienteModel extends CI_Model{
//inicializamos el constructor
    function __construct(){
        parent::__construct();
    }

    public function getClientes(){
		$this->db->select('cliente_id, cliente_nombre, cliente_apellido');
		$this->db->from('cliente'); 
		$query = $this->db->get();
		return $query->result();
	}
}
