<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TicketController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        require_once(APPPATH.'libraries/dompdf/autoload.inc.php');
        $this->dompdf = new \Dompdf\Dompdf();
        $this->load->model('TicketModel');
    }

    public function index(){
        $data['detalles'] = $this->TicketModel->getDetalle();
        $this->load->view('V_ticket', $data);
    }

    public function buscar_detalle_venta() {
        $detalle_Venta_id = $this->input->post('detalle_Venta_id');
        $data['detalles'] = $this->TicketModel->buscar_detalle_venta_por_factura($detalle_Venta_id);
        $this->load->view('V_ticket', $data);
}





}


?>