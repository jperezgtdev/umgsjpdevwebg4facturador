<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ingreso Proforma</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/Detalle/style.css'); ?>">
</head>

<body>
    <div class="form-container">
        <h1>Detalle de Venta</h1>
        <form method="POST" action="<?php echo site_url('Detalle/insertarDetalle'); ?>">
            <div class="form-group">
                <label for="detalle_venta_id">No. Factura</label>
                <input type="text" class="form-style" name="detalle_venta_id" id="detalle_venta_id"
                    value="<?php echo $venta_id; ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="detalle_producto_id">Producto</label>
                <input type="text" class="form-style" name="detalle_producto_id" id="detalle_producto_id" required>
            </div>
            <div class="form-group">
                <label for="detalle_descripcion">Descripción</label>
                <input type="text" class="form-style" name="detalle_descripcion" id="detalle_descripcion" required>
            </div>
            <div class="form-group">
                <label for="detalle_cantidad">Cantidad</label>
                <input type="number" class="form-style" name="detalle_cantidad" id="detalle_cantidad" required>
            </div>
            <div class="form-group">
                <label for="Detalle_precioUnitario">Precio Unitario</label>
                <input type="number" class="form-style" name="Detalle_precioUnitario" id="Detalle_precioUnitario"
                    step="0.01" required>
            </div>
            <button type="submit" class="btn" name="Guardar">Finalizar Compra</button>
        </form>
        <?php if ($this->session->flashdata('success_message')): ?>
            <div class="success-message">
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
            <script>
                setTimeout(function () {
                    window.location.href = "<?php echo site_url('venta/index'); ?>";
                }, 2000); // 2000 milisegundos = 2 segundos
            </script>
        <?php endif; ?>
    </div>
    </div>
</body>
</html>