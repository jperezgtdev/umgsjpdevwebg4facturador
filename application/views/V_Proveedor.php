<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/Proveedores/style.css'); ?>">

    <title>Ingreso de Proveedores y Pedido</title>
</head>
<body>
    <div class="container">
        <h2>Ingreso de Proveedores y Pedido</h2>
        
        <!-- Botón de Regresar -->
        
            <button class="btn" onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
        

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
                
            </tbody>
        </table>

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
