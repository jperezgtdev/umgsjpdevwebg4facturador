<?php
defined('BASEPATH') or exit('No direct script access allowed');
class detalle extends CI_Controller
{
    //inicializamos los valores del constructor
    function __construct()
    {
        parent::__construct();
        $this->load->model('detalleModel');
        $this->load->library('session');
    }
    //funcion index
    public function index($venta_id = null)
    {
        // Pasa el venta_id a la vista V_detalle
        $data['venta_id'] = $venta_id;
        $this->load->view('V_detalle', $data);
    }

    //funcion insertar
    public function insertarDetalle()
    {
        $data = array(
            'detalle_venta_id' => $this->input->post('detalle_venta_id'),
            'detalle_producto_id' => $this->input->post('detalle_producto_id'),
            'detalle_descripcion' => $this->input->post('detalle_descripcion'),
            'detalle_cantidad' => $this->input->post('detalle_cantidad'),
            'Detalle_precioUnitario	' => $this->input->post('Detalle_precioUnitario'),
        );
        $this->detalleModel->insertar($data);
        $this->session->set_flashdata('success_message', 'El detalle se ha insertado correctamente.');
        redirect('detalle/index');
    }
}