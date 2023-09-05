<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/Usuarios/css/style.css'); ?>">
    <title>Formulario de Registro</title>
</head>

<body>
    <button class="btn btn-secondary mt-4"
        onclick="location.href='<?php echo site_url('usuario/index'); ?>'">Regresar</button>
    <div class="container mt-4">
        <h1>Modificacion / Eliminación de Usuarios</h1>
        <!-- Area de Edicion-->
        <form action="<?php echo site_url('usuario/guardarEdicion'); ?>" method="post">    
            <h5>Editar Registro</h5>
                <div class="container">
                <!-- Inicio de Campos de edición Usuarios -->
                <div class="form-group">
                    <label for="ed_nombre">Nombre</label>
                    <input type="text" class="form-control" name="ed_nombre" id="ed_nombre" value="<?php echo $usuario->usuario_nombre;?>" required>
                </div>
                <div class="form-group">
                    <label for="ed_apellido">Apellido</label>
                    <input type="text" class="form-control" name="ed_apellido" id="ed_apellido" value="<?php echo $usuario->usuario_apellido?>"required>
                </div>
                <div class="form-group">
                    <label for="ed_email">email</label>
                    <input type="email" class="form-control" name="ed_email" id="ed_email" value="<?php echo $usuario->usuario_email;?>" required
                        autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="ed_password">pass</label>
                    <input type="password" class="form-control" onfocusout="cifrarpass();" name="ed_pasword"
                        id="ed_pasword" required>
                </div>
                <div class="form-group">
                    <label for="rol">estado</label>
                    <select class="form-select" name="ed_estado" id="ed_estado" required>
                        <option value="">seleccione estado</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select class="form-select" name="ed_rol" id="ed_rol" required>
                        <option value="0">seleccion un rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Normal</option>
                        <option value="3">Editor</option>
                        <option value="4">Invitado</option>
                        <option value="5">Moderador</option>
                    </select>
                </div>
                <div>
                    <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $usuario->usuario_id;?>">
                </div>
                <div class="container mt-3">
                    <button onclick="location.href='<?php echo site_url('usuario/index'); ?>'" type="submit"
                        id="btnGuardarCambios" class="btn btn-primary">Guardar Cambios</button>
                </div>
        </form>
    </div>
    <!-- Fin de Campos de Edición Usuario-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
        
    <script>
        
            //cifrar la contraseña
            function cifrarpass() {
                var pasword = $("#ed_pasword").val();
                var codificada = btoa(pasword);
                console.log(codificada);
                $("#ed_pasword").val(codificada);
                console.log("Finalice");
            }
    </script>

</body>

</html>