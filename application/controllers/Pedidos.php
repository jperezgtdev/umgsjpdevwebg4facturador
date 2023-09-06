<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    private $conn; // Variable para almacenar la conexión a la base de datos

    public function __construct() {
        parent::__construct();

        // Configuración de la conexión a la base de datos
        $this->servername = "localhost";
        $this->username = "root"; // Cambia esto si usas un nombre de usuario diferente
        $this->password = "";     // Cambia esto si tienes una contraseña definida
        $this->dbname = "g4facturador"; // El nombre de la base de datos que creaste

        // Crear una conexión
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function ingresarOrdenCompra() {
        // Tu lógica para ingresar órdenes de compra aquí
    }

    public function cerrarConexion() {
        // Cerrar la conexión a la base de datos
        $this->conn->close();
    }

    public function index() {
        // Agrega aquí la lógica para cargar la vista o realizar otras operaciones relacionadas con el controlador.
        $this->load->view('V_Pedidos');
    }
}
?>