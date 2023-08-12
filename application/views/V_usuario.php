<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: black;
            color: green;
        }
        /* Estilos específicos para los elementos que deseas resaltar en la vista */
        .form-control {
            background-color: black;
            color: green;
            border-color: green;
        }
        .btn-primary {
            background-color: green;
            border-color: green;
        }
/* Agrega estos estilos adicionales para la tabla */
.table {
    background-color: black;
    color: green;
    border-color: green;
}

/* Estilo para las celdas de encabezado y contenido de la tabla */
.table th,
.table td {
    background-color: black;
    color: green;
    border-color: green;
}

/* Estilo para resaltar filas al pasar el mouse por encima */
.table tbody tr:hover {
    background-color: green;
    color: black;
}
   </style>
    <title>Formulario de Registro</title>
</head>
<body>

<div class="container mt-4">
    <h1>Formulario de Registro y Modificacion de Usuarios</h1>
    <br></br>    
    <form action="<?php echo site_url('usuario/insertar'); ?>" method="post">
<!-- Ingreso de usuarios -->
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" required>
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" name="apellido" id="apellido" required>
        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" required autocomplete="correo">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" onfocusout="cifrarpass();" name="pass" id="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado Usuario</label>
                            <select class="form-select" name="estado" id="estado" required>
                                <option value="">seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-select" name="rol" id="rol" required>
                            <option value="0">seleccion un rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Normal</option>
                                <option value="3">Editor</option>
                                <option value="4">Invitado</option>
                                <option value="5">Moderador</option>
                            </select>
                        </div>
                </div>
                <br></br>
                <div class="text-center mt-4">
                    <center>
                    <button class="btn btn-primary" type="submit" value="Registrarme">Proceder con el Registro</button>
                    </center>
                    <br></br>
                </div>
                </form>
            </div>
           
        </div>
    </div>
  <!-- Fin de Ingreso de usuarios -->


<!-- Segundo modal de edición -->
<div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('usuario/guardarEdicion '); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal2Label">Editar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Inicio de Campos de edición Usuarios -->
                    
                    <div class="form-group">
                            <label for="ed_nombre">Nombre</label>
                            <input type="text" class="form-control" name="ed_nombre" id="ed_nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="ed_apellido">Apellido</label>
                            <input type="text" class="form-control" name="ed_apellido" id="ed_apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="ed_email">correo</label>
                            <input type="email" class="form-control" name="ed_correo" id="ed_correo" required autocomplete="correo">
                        </div>
                        <div class="form-group">
                            <label for="ed_password">pass</label>
                            <input type="password" class="form-control" onfocusout="cifrarpass();" name="ed_pass" id="ed_pass" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">estado</label>
                            <select class="form-select" name="estado" id="estado" required>
                                <option value="">seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-select" name="rol" id="rol" required>
                            <option value="0">seleccion un rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Normal</option>
                                <option value="3">Editor</option>
                                <option value="4">Invitado</option>
                                <option value="5">Moderador</option>
                            </select>
                        </div>
                </div>

                    <!-- Fin de Campos de Edición Usuario-->
                    
                    <div class ="from -group">
                        <input type="hidden" id="Edi" name ="usuario_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Inicio modal de Eliminacion Usuarios (Inactivacion) -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('usuario/eliminarUsuario'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal2Label">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- Campos de edición para el segundo modal -->
                    <div class="form-group">
                        <label id="mensaje">¿desea eliminar el usuario?</label>
                        <input type="hidden" name ="mEliminar" id="mensaje_id">

                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                 </div>
            </form>
        </div>
    </div>
</div>



    <div id="tabla-container">
    <table class="table table-hover table-bordered table-striped" id="tabla">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach  ($resultados as $row): ?>
            <tr>
                <td><?php echo $row->usuario_id; ?></td>
                <td><?php echo $row->usuario_nombre; ?></td>
                <td><?php echo $row->usuario_apellido ?></td>
                <td><?php echo $row->usuario_correo; ?></td>  
                <td>
                    <button class="btn btn-secondary btn-sm btn-mostrar" data-toggle="button" aria-pressed="false">Mostrar</button>
                    
                    <span class="contrasena-oculta"><?php echo $row->usuario_pass;?></span>
                </td>
                <td><?php echo $row->usuario_estado; ?></td>
                <td><?php echo $row->usuario_rol_id; ?></td>
                <td><button class="btn btn-primary btn-sm btn-editar"   data-bs-toggle="modal" data-bs-target="#editModal2"  data-id="<?php echo $row->usuario_id; ?>">Modificar Usuario</button></td>
                <td><button class="btn btn-danger btn-sm btn-eliminar"   data-bs-toggle="modal" data-bs-target="#eliminarModal"  data-id="<?php echo $row->usuario_id; ?>"   >Eliminar</button></td>
      </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
            $(".btn-editar").click(function() {

                console.log("Botón Editar clickeado");
                var id_usuario = $(this).data("id");
                var usuario = $(this).closest("tr").find("td:eq(0)").text();
                var nombre = $(this).closest("tr").find("td:eq(1)").text();
                var telefono = $(this).closest("tr").find("td:eq(2)").text();
                var correo = $(this).closest("tr").find("td:eq(3)").text();
                var rol = $(this).closest("tr").find("td:eq(4)").text();
                var estado = $(this).closest("tr").find("td:eq(5)").text();

                $("#edit_usuario2").val(usuario);
                $("#edit_nombre2").val(nombre);
                $("#edit_telefono2").val(telefono);
                $("#edit_correo2").val(correo);
                $("#edit_rol2").val(rol);
                $("#edit_estado").val(estado);
                $("#Edi").val(id_usuario);
                
            });
                    //eliminado logico
                    $(".btn-eliminar").click(function() {
            var c = $(this).data("id");
            $("#mensaje_id").val(c);
             });   
        });


//cifrar la contraseña

		function cifrarpass(){
			var pass = $("#pass").val();
			var codificada = btoa(pass);
			console.log(codificada);
			$("#pass").val(codificada);
			console.log("Finalice");
		} 
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<!--/ocultar o mostrar la contraseña-->
<script>
    // Obtén todos los botones "Mostrar Contraseña"
    const mostrarButtons = document.querySelectorAll('.btn-mostrar');

    // Oculta las contraseñas al inicio
    const contrasenasOcultas = document.querySelectorAll('.contrasena-oculta');
    contrasenasOcultas.forEach(contrasena => {
        contrasena.style.display = 'none';
    });

    // Agrega un evento clic a cada botón
    mostrarButtons.forEach(button => {
        button.addEventListener('click', () => {
            const row = button.closest('tr'); // Obtén la fila actual
            const contrasenaOculta = row.querySelector('.contrasena-oculta'); // Obtén el elemento de contraseña oculta
            if (contrasenaOculta.style.display === 'none') {
                contrasenaOculta.style.display = 'inline'; // Muestra la contraseña
                button.setAttribute('aria-pressed', 'true');
                button.classList.remove('btn-secondary');
                button.classList.add('btn-success');
            } else {
                contrasenaOculta.style.display = 'none'; // Oculta la contraseña
                button.setAttribute('aria-pressed', 'false');
                button.classList.remove('btn-success');
                button.classList.add('btn-secondary');
            }
        });
    });
</script>

</body>
</html>
