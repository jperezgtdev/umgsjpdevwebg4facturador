<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PedidosModel');
    }

    public function ingresarOrdenCompra() {
        // Obtener los datos del formulario
        $nombreCliente = $this->input->post('nombre_cliente');
        $producto = $this->input->post('producto');
        $descripcion = $this->input->post('descripcion');
        $cantidad = $this->input->post('cantidad');
        $precio = $this->input->post('precio');
        $tipo = $this->input->post('tipo');

        // Llamar al modelo para ingresar la orden de compra
        $resultado = $this->PedidosModel->ingresarOrdenCompra($nombreCliente, $producto, $descripcion, $cantidad, $precio, $tipo);

        // Redireccionar a la vista de pedidos con un mensaje de confirmación
        redirect('pedidos/index?mensaje=' . urlencode($resultado));
    }

    public function index() {
        $data['mensaje'] = $this->input->get('mensaje'); // Obtener el mensaje de confirmación desde la URL
        $this->load->view('V_Pedidos', $data);
    }
}
?>
