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
            
            <button type="submit" name="submit">Ingrese Orden de Compra</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Aquí puedes mostrar un mensaje de confirmación o los detalles de la orden ingresada.
            echo "<div class='confirmation'>";
            echo "Orden de compra ingresada exitosamente.";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
