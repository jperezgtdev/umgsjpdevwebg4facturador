<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PedidosModel extends CI_Model {

    private $conexion;

    public function __construct() {
        parent::__construct();
        // Crear una conexión a la base de datos (si no la tienes configurada en CodeIgniter)
        $this->conexion = new mysqli("localhost", "root", "", "g4facturador");

        // Verificar la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function ingresarOrdenCompra($nombreCliente, $producto, $descripcion, $cantidad, $precio, $tipo) {
        // Validación de datos (puedes mejorar esto según tus necesidades)
        if (empty($nombreCliente) || empty($producto) || empty($cantidad) || empty($precio)) {
            return "Por favor, complete todos los campos obligatorios.";
        }

        // Insertar datos en la tabla "ingreso_de_pedidos_de_compras"
        $sql = "INSERT INTO ingreso_de_pedidos_de_compras (cliente, producto, descripcion, cantidad, precio, tipo)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ssssss", $nombreCliente, $producto, $descripcion, $cantidad, $precio, $tipo);

        if ($stmt->execute()) {
            $stmt->close();

            // Almacenar los datos también en la sesión
            $orden = array(
                'nombre_cliente' => $nombreCliente,
                'producto' => $producto,
                'descripcion' => $descripcion,
                'cantidad' => $cantidad,
                'precio' => $precio,
                'tipo' => $tipo
            );

            // Iniciar sesión si no está iniciada
            if (!isset($_SESSION)) {
                session_start();
            }

            // Agrega la orden al arreglo de órdenes en la sesión
            $_SESSION['ordenes'][] = $orden;

            return "Orden de compra ingresada exitosamente.";
        } else {
            $stmt->close();
            return "Error al ingresar la orden de compra: " . $this->conexion->error;
        }
    }

    public function cerrarConexion() {
        // Cerrar la conexión a la base de datos
        $this->conexion->close();
    }

    public function index() {
        // Agrega aquí la lógica para cargar la vista o realizar otras operaciones relacionadas con el modelo.
    }
}
?>
