<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/Ticket/Css/style.css'); ?>">
   
    <title>Formulario y Tabla</title>
    
</head>
<body>
<div class="container mt-5">
<button class="btn" onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
            <h2>Ingreso de Productos</h2>
    <form action="<?php echo site_url('producto/agregar')?>" method="post">
    <div class="form-group">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto">
    </div>
    <div class="form-group">
        <label for="stock">Stock del Producto:</label>
        <input type="text" class="form-control" id="stock" name="stock" placeholder="Ingrese el stock del producto">
    </div>
    <div class="form-group">
        <label for="prov">Proveedor del Producto:</label>
        <input type="text" class="form-control" id="prov" name="prov" placeholder="Ingrese el proveedor del producto">
    </div>
    <button type="submit" class="btn btn-primary">Agregar Producto</button>
</form>
</div>
<div class="container mt-5">
     <h2 class="mt-5">Lista de Productos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultados as $row):?>
                <tr>
                    <td><?php echo $row->Producto_id;?></td>
                    <td><?php echo $row->Producto_nombre;?></td>
                    <td><?php echo $row->Producto_stock;?></td>
                    <td><?php echo $row->Producto_Proveedor_id;?></td>
                </tr>
            <?php endforeach;?>
           
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

</script>
</body>
</html>
