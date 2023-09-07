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

        input[type="text"], input[type="date"], textarea {
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
    <title>Ingreso de Proveedores y Pedido</title>
</head>
<body>
    <div class="container">
        <h2>Ingreso de Proveedores y Pedido</h2>
        
        <!-- Botón de Regresar -->
        <div class="regresar-button">
            <button class="btn" onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
        </div>

        <!-- Formulario para ingresar proveedores y pedidos -->
        <form id="proveedorPedidoForm">
            <label>Proveedor:</label><br>
            Nombre: <input type="text" name="nombre"><br>
            Dirección: <input type="text" name="direccion"><br>
            Teléfono: <input type="text" name="telefono"><br><br>

            <label>Pedido:</label><br>
            Proveedor ID: <input type="text" name="id_proveedor"><br>
            Fecha: <input type="date" name="fecha"><br>
            Descripción: <textarea name="descripcion" rows="4" cols="50"></textarea><br><br>

            <button type="button" class="btn" onclick="guardarDatos()">Guardar</button>
        </form>

        <!-- Tabla para mostrar los datos ingresados -->
        <table id="tablaDatos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Proveedor ID</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los datos ingresados -->
            </tbody>
        </table>

        <!-- Script JavaScript para capturar y mostrar los datos -->
        <script>
            function guardarDatos() {
                const nombre = document.getElementsByName("nombre")[0].value;
                const direccion = document.getElementsByName("direccion")[0].value;
                const telefono = document.getElementsByName("telefono")[0].value;
                const id_proveedor = document.getElementsByName("id_proveedor")[0].value;
                const fecha = document.getElementsByName("fecha")[0].value;
                const descripcion = document.getElementsByName("descripcion")[0].value;

                if (!nombre || !direccion || !telefono || !id_proveedor || !fecha || !descripcion) {
                    alert("Por favor, complete todos los campos.");
                    return;
                }

                const tabla = document.getElementById("tablaDatos").getElementsByTagName('tbody')[0];
                const newRow = tabla.insertRow(tabla.rows.length);
                const cell1 = newRow.insertCell(0);
                const cell2 = newRow.insertCell(1);
                const cell3 = newRow.insertCell(2);
                const cell4 = newRow.insertCell(3);
                const cell5 = newRow.insertCell(4);
                const cell6 = newRow.insertCell(5);
                const cell7 = newRow.insertCell(6);
                cell1.innerHTML = tabla.rows.length;
                cell2.innerHTML = nombre;
                cell3.innerHTML = direccion;
                cell4.innerHTML = telefono;
                cell5.innerHTML = id_proveedor;
                cell6.innerHTML = fecha;
                cell7.innerHTML = descripcion;

                document.getElementById("proveedorPedidoForm").reset();
            }
        </script>
    </div>
</body>
</html>
