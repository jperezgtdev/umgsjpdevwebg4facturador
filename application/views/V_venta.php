<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de Ventas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/Venta/style.css'); ?>">
</head>
<body>


<div class="">
    <button class="btn" onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
    <div class="form-container mt-3">
       <h1>Registro de Ventas</h1>
        <form id="venta-form" method="POST" action="<?php echo site_url('venta/insertar') ?>">
        <div class="form-group">
                <label for="fecha">Fecha</label> 
                <input type="date" class="form-style" id="venta_fecha" name="venta_fecha" value="<?php date_default_timezone_set('America/Guatemala'); echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="form-group mt-2">
                <label for="cliente">Cliente</label>
                <select name="cliente" id="cliente" class="form-style" required>
                    <option value="">Seleccione un cliente</option>
                    <?php foreach($clientes as $cliente): ?>
                        <option value="<?php echo $cliente->cliente_id; ?>"><?php echo $cliente->cliente_name; ?> <?php echo $cliente->cliente_apellido; ?></option>
                    <?php endforeach; ?>
                </select>
            <label>Metodo Pago</label>
            <select name="metodo_pago" id="metodo_pago" class="form-style" required>
                <option value="">Seleccione un metodo de pago</option>
                <option value="1">Tarjeta de Crédito</option>
                <option value="2">Transferencia Bancaria</option>
                <option value="3">Efectivo</option>
                <option value="4">Cheque</option>
                <option value="5">Pago Móvil</option>
                </select>
             <button type="submit" class="btn" name="Guardar">Guardar</button>
        </form>
    </div>
</div>
</body>
</html>

