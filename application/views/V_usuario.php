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
        onclick="location.href='<?php echo site_url('dashboard/index'); ?>'">Regresar</button>
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
                            <input type="hidden" name="mEliminar" id="mensaje_id">

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
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row->usuario_id; ?>
                        </td>
                        <td>
                            <?php echo $row->usuario_nombre; ?>
                        </td>
                        <td>
                            <?php echo $row->usuario_apellido ?>
                        </td>
                        <td>
                            <?php echo $row->usuario_email; ?>
                        </td>
                        <td>
                            <button class="btn btn-secondary btn-sm btn-mostrar" data-toggle="button"
                                aria-pressed="false">Mostrar</button>

                            <span class="contrasena-oculta">
                                <?php echo $row->usuario_password; ?>
                            </span>
                        </td>
                        <td>
                            <?php echo $row->usuario_estado; ?>
                        </td>
                        <td>
                            <?php echo $row->usuario_rol_id; ?>
                        </td>
                        <td><button onclick="editarUsuario(<?php echo $row->usuario_id; ?>)" class="btn btn-primary btn-sm btn-editar" data-id="<?php echo $row->usuario_id; ?>">Modificar Usuario</button></td>
                        <td><button class="btn btn-danger btn-sm btn-eliminar" data-bs-toggle="modal"
                                data-bs-target="#eliminarModal" data-id="<?php echo $row->usuario_id; ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            //eliminado logico
            $(".btn-eliminar").click(function () {
                var c = $(this).data("id");
                $("#mensaje_id").val(c);
            });

            //cifrar la contraseña
            function cifrarpass() {
                var pasword = $("#pasword").val();
                var codificada = btoa(pasword);
                console.log(codificada);
                $("#pasword").val(codificada);
                console.log("Finalice");
            }
        });

        function editarUsuario(usuarioId) {
        window.location.href = "<?php echo site_url('usuario/editarUser/') ?>" + usuarioId;
    }

    </script>
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