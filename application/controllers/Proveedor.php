<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProveedorModel'); // Carga el modelo en el constructor
    }

    public function index() {
        $this->load->view('V_Proveedor');
    }

    public function insertarProveedor() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $nombre = $this->input->post('nombre');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');

            // Llama a la función del modelo para insertar el proveedor
            if ($this->ProveedorModel->insertarProveedor($nombre, $direccion, $telefono)) {
                echo "<p class='message'>Proveedor guardado exitosamente.</p>";
            } else {
                echo "<p class='error'>Error al guardar el proveedor.</p>";
            }
        }
    }

    public function insertarPedido() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id_proveedor = $this->input->post('id_proveedor');
            $fecha = $this->input->post('fecha');
            $descripcion = $this->input->post('descripcion');

            // Llama a la función del modelo para insertar el pedido
            if ($this->ProveedorModel->insertarPedido($id_proveedor, $fecha, $descripcion)) {
                echo "<p class='message'>Pedido guardado exitosamente.</p>";
            } else {
                echo "<p class='error'>Error al guardar el pedido.</p>";
            }
        }
    }
}
?>
