<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            color: green;
        }

        .error {
            text-align: center;
            color: red;
        }

        .regresar-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <title>Ingreso de Proveedores y Pedido</title>
</head>
<body>
    <div class="container">
        <h2>Ingreso de Proveedores y Pedido</h2>
        
        <!-- Botón de Regresar -->
        <div class="regresar-button">
            <button class="btn" onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
        </div>

        <!-- Formulario para ingresar proveedores -->
        <form action="<?php echo site_url('proveedor/insertarProveedor'); ?>" method="post">
            <label>Proveedor:</label><br>
            Nombre: <input type="text" name="nombre"><br>
            Dirección: <input type="text" name="direccion"><br>
            Teléfono: <input type="text" name="telefono"><br><br>
            <input class="btn" type="submit" value="Guardar">
        </form>
        
        <!-- Formulario para ingresar pedidos -->
        <form action="<?php echo site_url('proveedor/insertarPedido'); ?>" method="post">
            <label>Pedido:</label><br>
            Proveedor ID: <input type="text" name="id_proveedor"><br>
            Fecha: <input type="text" name="fecha"><br>
            Descripción: <input type="text" name="descripcion"><br><br>
            <input class="btn" type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
