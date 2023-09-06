<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actualizar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UsuarioModelNuevo');
        $this->load->library('form_validation');
    }

    public function index($usuario_id = null) {
        if (!$usuario_id) {
            show_error("ID de usuario no proporcionado");
            return;
        }

        $usuario = $this->UsuarioModelNuevo->obtenerUsuario($usuario_id);

        if (!$usuario) {
            show_error("Usuario no encontrado");
            return;
        }

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->validarYActualizarUsuario($usuario_id);
        }

        $data['usuario'] = $usuario;
     
        $this->load->view('V_ActualizarUsuario', ['usuario_id' => $usuario_id]);
    }

    private function validarYActualizarUsuario($usuario_id) {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');

        if ($this->form_validation->run() === TRUE) {
            $nombreUsuario = $this->input->post('nombre');
            $apellidoUsuario = $this->input->post('apellido');
            $correoUsuario = $this->input->post('correo');
            $contrasenaUsuario = $this->input->post('pass');
            $estadoUsuario = $this->input->post('estado');
            $rolUsuario = $this->input->post('rol');

            $actualizado = $this->UsuarioModelNuevo->actualizarUsuario($usuario_id, $nombreUsuario, $apellidoUsuario, $correoUsuario, $contrasenaUsuario, $estadoUsuario, $rolUsuario);

            if ($actualizado) {
                echo "Registro actualizado correctamente";
            } else {
                echo "Error al actualizar el registro";
            }
        } else {
            // Manejo de errores de validación
            // Puedes mostrar mensajes de error específicos aquí
            // o redirigir de vuelta al formulario con errores
        }
    }
}
?>
