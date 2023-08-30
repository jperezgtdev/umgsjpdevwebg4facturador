<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ingreso de Venta</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/Detalle/style.css'); ?>">
</head>
<body>
    <div class="form-container">
        <h1>Ingreso de Venta</h1>
        <form method="POST" action="<?php echo site_url('exampleController/guardar'); ?>">
            <div class="form-group">
                <label for="detalle_venta_id">Numero de Factura: </label>
                <input type="text" class="form-style" name="detalle_venta_id" id="detalle_venta_id"
                    value="<?php echo $venta_id; ?>" readonly required>
            </div>
            <h2>Detalle de Venta</h2>
            <table id="detalle_table">
                <tr>
                    <th>Producto ID</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                </tr>
                <tr>
                    <td><select name="detalle_producto_id[]" id="lista_productos" class="form-style" required>
                            <option value="">Seleccione un producto</option>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?php echo $producto->Producto_id; ?>"><?php echo $producto->Producto_nombre; ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><input class="form-style" type="text" name="detalle_descripcion[]" required></td>
                    <td><input class="form-style" type="number" name="detalle_cantidad[]" required></td>
                    <td><input class="form-style" type="number" step="0.01" name="detalle_precio_unitario[]" required></td>
                </tr>
            </table>

            <button type="button" class="btn" onclick="agregarFila()">Agregar Producto</button>
            <button type="submit" class="btn" name="Guardar" onclick="return confirm('¿Estás seguro de que deseas finalizar la compra?')">Guardar Venta</button>
        </form>
    </div>
    <script>
        function agregarFila() {
            var table = document.getElementById("detalle_table");
            var filaContenedor = document.createElement('tr');
            filaContenedor.innerHTML = `
                <td>${document.getElementById('lista_productos').outerHTML}</td>
                <td><input class="form-style" type="text" name="detalle_descripcion[]" required></td>
                <td><input class="form-style" type="number" name="detalle_cantidad[]" required></td>
                <td><input class="form-style" type="number" step="0.01" name="detalle_precio_unitario[]" required></td>
                <td><button class="btn-warning" type="button" onclick="eliminarFila(this)">Eliminar</button></td>
            `;
            table.appendChild(filaContenedor);
        }
        function eliminarFila(btn) {
            var fila = btn.parentNode.parentNode;
            fila.parentNode.removeChild(fila);
    }

    </script>
</body>
</html>
