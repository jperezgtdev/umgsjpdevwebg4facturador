<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class producto extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('productoModel');
    }
    public function index(){
        $resultados = $this->productoModel->getProductoData();
		$this->data['resultados'] = $resultados;
		$this->load->view('V_producto', $this->data);
    }

    public function agregar() {
        $nombre = $this->input->post('nombre');
        $stock = $this->input->post('stock');
        $prov = $this->input->post('prov');
         
        // Puedes validar los campos aquí antes de insertar en la base de datos
        
        if ($this->productoModel->agregarProducto($nombre, $stock, $prov)) {
            echo("success");
        } else {
            echo("error");
        }
        redirect('producto/index');
    }
    



}
?>

