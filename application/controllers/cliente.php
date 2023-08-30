 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Cliente extends CI_Controller{
  //INICIALIZAMOS LOS VALORES DEL CONSTRUCTOR
     function __construct(){
         parent::__construct();
         $this->load->model('clienteModel');
   }

// FUNCION INDEX
     public function index(){
         $data['clientes'] = $this->clienteModel->getClientes();
         $this->load->view('V_venta', $data);
     }
}