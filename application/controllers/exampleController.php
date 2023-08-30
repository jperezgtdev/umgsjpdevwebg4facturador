<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Venta_model');
        $this->load->model('productoModel');
        $this->load->model('detalleModel');
    }

    public function index($venta_id = null)
    {
        $data['productos'] = $this->productoModel->sendProductos();
        // Pasa el venta_id a la vista V_detalle
        $data['venta_id'] = $venta_id;
        $this->load->view('example', $data);
    }
    
    public function guardar() {

        // Obtener los datos de los detalles de venta
        $venta_id = $this->input->post('detalle_venta_id');
        $detalle_producto_id = $this->input->post('detalle_producto_id');
        $detalle_descripcion = $this->input->post('detalle_descripcion');
        $detalle_cantidad = $this->input->post('detalle_cantidad');
        $detalle_precio_unitario = $this->input->post('detalle_precio_unitario');

        // Insertar los detalles de venta en la base de datos
        for ($i = 0; $i < count($detalle_producto_id); $i++) {
            $detalle_data = array(
                'detalle_venta_id' => $venta_id,
                'detalle_producto_id' => $detalle_producto_id[$i],
                'detalle_descripcion' => $detalle_descripcion[$i],
                'detalle_cantidad' => $detalle_cantidad[$i],
                'detalle_precioUnitario' => $detalle_precio_unitario[$i]
            );
            $this->detalleModel->insertar($detalle_data);
        }
        echo "Venta guardada correctamente";
        

    }

}
?>