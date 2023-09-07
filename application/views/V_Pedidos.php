<!DOCTYPE html>
<html>
<head>
    <title>Ingreso de Pedidos de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select, textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        button:hover {
            background-color: #0056b3;
        }
        .confirmation {
            color: green;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ingreso de Pedidos de Compras</h1>

        <!-- Botón de Regresar -->
        <div style="text-align: center;">
            <button onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nombre_cliente">Nombre del Cliente:</label>
            <input type="text" name="nombre_cliente" required>
            
            <label for="producto">Producto o Servicio:</label>
            <input type="text" name="producto" required>
            
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" rows="4" required></textarea>
            
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" step="0.01" required>

            <label for="tipo">Tipo de Pedido:</label>
            <select name="tipo">
                <option value="pedido">Pedido</option>
                <option value="compra">Compra</option>
            </select>
            
            <button type="submit" name="submit">Ingrese Orden</button>
        </form>

        <?php
        session_start(); // Iniciar sesión

        if (!isset($_SESSION['ordenes'])) {
            $_SESSION['ordenes'] = array(); // Inicializar el arreglo de órdenes en la sesión
        }

        if (isset($_POST['submit'])) {
            // Almacena los datos ingresados en un arreglo asociativo
            $orden = array(
                'nombre_cliente' => $_POST['nombre_cliente'],
                'producto' => $_POST['producto'],
                'descripcion' => $_POST['descripcion'],
                'cantidad' => $_POST['cantidad'],
                'precio' => $_POST['precio'],
                'tipo' => $_POST['tipo']
            );

            // Agrega la orden al arreglo de órdenes en la sesión
            $_SESSION['ordenes'][] = $orden;

            // Mostrar un mensaje de confirmación
            echo "<div class='confirmation'>";
            echo "Orden ingresada exitosamente.";
            echo "</div>";
        }

        // Mostrar los datos ingresados en una tabla
        echo "<h2>Datos Ingresados:</h2>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nombre del Cliente</th>";
        echo "<th>Producto o Servicio</th>";
        echo "<th>Descripción</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Precio</th>";
        echo "<th>Tipo de Pedido</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Iterar a través de las órdenes en la sesión y mostrar cada una en una fila de la tabla
        foreach ($_SESSION['ordenes'] as $orden) {
            echo "<tr>";
            echo "<td>" . $orden['nombre_cliente'] . "</td>";
            echo "<td>" . $orden['producto'] . "</td>";
            echo "<td>" . $orden['descripcion'] . "</td>";
            echo "<td>" . $orden['cantidad'] . "</td>";
            echo "<td>" . $orden['precio'] . "</td>";
            echo "<td>" . $orden['tipo'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        // Destruir la sesión después de mostrar los datos ingresados
        session_destroy();
    
        ?>
    </div>
</body>
</html>
