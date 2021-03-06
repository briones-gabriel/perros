<?php
session_start();

if (!isset($_SESSION["Rol"]) || $_SESSION["Rol"] != 1) {
    header("Location: /perros");
}

$carpeta_actual = basename(getcwd());
?>
<!doctype html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta charset="utf-8">


    <link rel="icon" href="../../../recursos/logo.png">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table.dataTable.no-footer {
            border-bottom: 0px solid #E3E9EA;
        }

        .table-responsive {
            overflow-x: inherit;
        }
    </style>

    <title>Usuarios | Bromatologia</title>
</head>

<body>
    <?php include_once "../componentes/header.php"; ?>

    <div class="container">
        <h2 class="my-3">Usuarios</h2>
        <div class="col mt-3">
            <input class="form-control" id="inputBuscarUsuarios" type="search" placeholder="Escriba para buscar usuarios...">
        </div>

        <div class="row">
            <div class="col-lg-12 table-responsive"><br>
                <table id="usuarios" class="table table-hover table-bordered ">
                    <thead>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Administrador</th>
                        <th class="text-center">Activo</th>
                        <th class="text-center">Acciones</th>
                    </thead>
                    <tbody>
                        <?php include "../../conexion/get_users.php"; ?>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td class="text-center align-middle"><?php echo $usuario["Usuario"]; ?></td>
                                <td class="text-center align-middle"><?php echo $usuario["Nombre"] .
                                    " " .
                                    $usuario["Apellido"]; ?></td>
                                <td class="text-center align-middle"><?php echo $usuario["Rol"] == 1
                                    ? "Si"
                                    : "No"; ?></td>
                                <td class="text-center align-middle"><?php echo $usuario["Activo"]
                                    ? "Si"
                                    : "No"; ?></td>
                                <td class=" text-center align-middle">
                                    <button class="btn border" style="color:red" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar" onclick="eliminarUsuario(<?php echo $usuario[
                                        "UsuarioId"
                                    ]; ?>)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
</body>

<!--LINK: https://cdn.datatables.net/-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/de1cdf12c2.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../../js/page_usuarios/scripts.js" type="module"></script>
<script src="../../../js/modulos/bootstrap/bootstrap.js" type="module"></script>

<?php include_once "../componentes/footer.php"; ?>
<?php include_once "../componentes/modals.php"; ?>

</html>
