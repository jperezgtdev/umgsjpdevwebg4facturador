<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class loginModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Lllamada de datos para loguin se deben traer los datos  correo, password, estado y roll
    public function authenticate($email, $password) {
        $this->db->select('usuario_email, usuario_password, usuario_estado');
        $this->db->from('usuario');
        $this->db->where('usuario_email', $email);
        $this->db->where('usuario_password', sha1($password));
        $this->db->where('usuario_estado', 1); // Comprobamos el estado del usuario
        $userregistrado = $this->db->get()->row();
        return $userregistrado;
    }
    public function emailExists($email) {
        $this->db->where('usuario_email', $email);
        $query = $this->db->get('usuario');
        return $query->num_rows() > 0;
    }
    
    public function insertarUsuario($data){
        $this->db->insert('usuario',$data);
    }

    public function insertarCliente($cliente_data){
        $this->db->insert('cliente',$cliente_data);
    }
    

}
