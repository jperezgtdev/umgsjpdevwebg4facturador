<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/Ticket/Css/style.css'); ?>">
    <title>Recibo de Venta</title>
</head>

<body>
<button class="btn btn-secondary mt-4 ml-2" style="position: absolute; left: 0; top: 0;" onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
<button type="submit" class="btn btn-primary" style="position: absolute; right: 0; top: 0;">Buscar</button>
 <div class="recibo">
        <div class="titulo">Recibo de Venta</div>
        <form action="<?php echo site_url('buscar_detalle_venta'); ?>" method="post">
            <div class="form-group">
              
                <input type="text" name="detalle_Venta_id" id="detalle_Venta_id" class="form-control" style="position: absolute; right: 0; top: 75px; width: 150px; font-size: 14px;">

            </div>
            
        </form>
        <?php if (isset($detalles) && !empty($detalles)): ?>
            <?php foreach ($detalles as $detalle): ?>
                <div class="detalle">
                    <div>
                        <label>Numero de factura: </label>
                        <?php echo $detalle->detalle_Venta_id; ?>
                    </div>
                    <div>
                        <label for="">Codigo de producto: </label>
                        <?php echo $detalle->detalle_Producto_id; ?>
                    </div>
                    <div>
                        <label for="">Descripcion: </label>
                        <?php echo $detalle->detalle_descripcion; ?>
                    </div>
                    <div>
                        <label for="">Cantidad: </label>
                        <?php echo $detalle->detalle_cantidad; ?>
                    </div>
                    <div>
                        <label for="">Precio Unitario: </label>
                        <?php echo $detalle->detalle_precioUnitario; ?>
                    </div>
                    <div>
                        <label for="">Total: </label>
                        <?php
                            $total = $detalle->detalle_cantidad * $detalle->detalle_precioUnitario;
                            echo $total;
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php elseif (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>
