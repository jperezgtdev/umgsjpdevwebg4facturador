<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioModel extends CI_Model{

function __construct()
	{
		parent::__construct();
	}

    public function getUsuarioData(){
		$this->db->select('usuario_id,usuario_nombre,usuario_apellido,usuario_correo,usuario_pass,usuario_estado,usuario_rol_id');
		$this->db->from('usuario');
	    $this->db->where('usuario_estado = 1'); //De momento se ingresa el campo rol en null
 		$query = $this->db->get();
		return $query->result();
	}

    public function insertarUsuario($data){
        $this->db->insert('usuario',$data);
    }

	public function modificarUsuario($data, $id) {
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
	
	}

	public function eliminarUsuario($id,$data) {
		$this->db->where('usuario_id', $id);
		$this->db->update('usuario', $data);
	}

	public function validar_usuario($usuario, $pass) {
        $UsuarioEstado = '1';
        $this->db->where('usuario_correo', $usuario);
        $this->db->where('usuario_pass', $pass);
        $this->db->where('usuario_estado',$UsuarioEstado);
        $query = $this->db->get('Usuario');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_usuario;
        } else {
            return false;
        }
    }
	
}