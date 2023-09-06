<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModelNuevo extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database(); // Asegúrate de cargar la base de datos
    }

    public function obtenerUsuario($usuario_id) {
        $this->db->where('usuario_id', $usuario_id);
        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function actualizarUsuario($usuario_id, $nombre, $apellido, $correo, $contrasena, $estado, $rol) {
        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'contrasena' => $contrasena,
            'estado' => $estado,
            'rol' => $rol
        );

        $this->db->where('usuario_id', $usuario_id);
        $result = $this->db->update('usuario', $data);

        return $result;
    }
}
?>
