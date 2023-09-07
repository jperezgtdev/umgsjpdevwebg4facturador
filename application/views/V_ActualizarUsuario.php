<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1 ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/Actualizarusuario/style.css'); ?>">
    <title>Actualizar Usuario</title>
   
</head>
<body>
    <header>
        <div class="container mt-4">
            <h1>Actualizar Usuario</h1>

            <!-- Botón de Regresar -->
            <button class="btn" onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
        
        </div>
    </header>
    <div class="container mt-4">
        <!-- Formulario de actualización -->
        <form action="index.php/actualizar/index/<?php echo $usuario_id; ?>" method="post" onsubmit="return validarContraseña();">
            <table class="table">
                <tr>
                    <td><label for="nombre">Nombre</label></td>
                    <td><input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo isset($usuario['Usuario_nombre']) ? $usuario['Usuario_nombre'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="apellido">Apellido</label></td>
                    <td><input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo isset($usuario['Usuario_apellido']) ? $usuario['Usuario_apellido'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="correo">Correo</label></td>
                    <td><input type="email" class="form-control" name="correo" id="correo" value="<?php echo isset($usuario['Usuario_correo']) ? $usuario['Usuario_correo'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="pass">Contraseña</label></td>
                    <td><input type="password" class="form-control" name="pass" id="pass" value="" minlength="8" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required></td>
                </tr>
                <tr>
                    <td><label for="estado">Estado Usuario</label></td>
                    <td>
                        <select class="form-select" name="estado" id="estado" required>
                            <option value="">Seleccione estado</option>
                            <option value="1" <?php if (isset($usuario['Usuario_estado']) && $usuario['Usuario_estado'] == '1') echo 'selected'; ?>>Activo</option>
                            <option value="0" <?php if (isset($usuario['Usuario_estado']) && $usuario['Usuario_estado'] == '0') echo 'selected'; ?>>Inactivo</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="rol">Rol</label></td>
                    <td>
                        <select class="form-select" name="rol" id="rol" required>
                            <option value="">Seleccione un rol</option>
                            <option value="1" <?php if (isset($usuario['Usuario_Rol_id']) && $usuario['Usuario_Rol_id'] == '1') echo 'selected'; ?>>Administrador</option>
                            <option value="2" <?php if (isset($usuario['Usuario_Rol_id']) && $usuario['Usuario_Rol_id'] == '2') echo 'selected'; ?>>Normal</option>
                            <option value="3" <?php if (isset($usuario['Usuario_Rol_id']) && $usuario['Usuario_Rol_id'] == '3') echo 'selected'; ?>>Editor</option>
                            <option value="4" <?php if (isset($usuario['Usuario_Rol_id']) && $usuario['Usuario_Rol_id'] == '4') echo 'selected'; ?>>Invitado</option>
                            <option value="5" <?php if (isset($usuario['Usuario_Rol_id']) && $usuario['Usuario_Rol_id'] == '5') echo 'selected'; ?>>Moderador</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
    <script>
        function validarContraseña() {
            var contraseña = document.getElementById('pass').value;
            var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            if (!regex.test(contraseña)) {
                alert("La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra y un número.");
                return false;
            }
            return true;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
