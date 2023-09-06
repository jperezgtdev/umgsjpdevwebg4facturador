<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio</title>
<link rel="stylesheet" href="<?php echo base_url('assets/Dashboard/css/style.css'); ?>">
</head>

<body>
	<div class=form-group>
	<button onclick="location.href='<?php echo site_url('login/logout'); ?>'">Cerrar Sesion</button>
	</div>
	<h1>Catálogo de Opciones</h1>

	<p>Elige una opción:</p>

	<button class ="mb-2"onclick="location.href='<?php echo site_url('usuario/index'); ?>'">Modificación / Eliminación de Usuarios Registrados</button> <!--redireccion al sitio-->
	<button class ="mb-2" onclick="location.href='<?php echo site_url('venta/index');?>'">Iniciar Proceso Venta</button>
	<button class ="mb-2" onclick="location.href='<?php echo site_url('producto/index');?>'">Ingreso de Productos</button>	
	<button class ="mb-2" onclick="location.href='<?php echo site_url('TicketController/index');?>'">Reimpresion de ticket</button>
	<button class ="mb-2" onclick="location.href='<?php echo site_url('proveedor/index');?>'">Ingreso de Proveedores y Pedido</button>
	<button class ="mb-2" onclick="location.href='<?php echo site_url('pedidos/index');?>'">Ingreso de Pedidos de Compras</button>
	<button class ="mb-2" onclick="location.href='<?php echo site_url('actualizar/index/1');?>'">Actualizar Usuario</button>







</body>	
</html>