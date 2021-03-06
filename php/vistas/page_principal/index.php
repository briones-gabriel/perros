<?php
include_once "../../conexion/get_perros.php";
session_start();

if (!isset($_SESSION["Rol"])) {
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

    <link href="../../../css/page_principal/styles.css" rel="stylesheet">

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
    
    <title>Perros | Bromatologia</title>
</head>

<body class="d-flex flex-column align-items-beetwen">
    <?php include_once "../componentes/header.php"; ?>
    <div class="container">
        <h2 class="my-3">Perros</h2>
        <div class="col my-3">
            <input class="form-control" id="inputBuscarPerro" type="text" placeholder="Escriba para buscar perros...">
        </div>
        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table id="perros" class="table table-hover table-bordered">
                    <thead>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Apodo</th>
                        <th class="text-center">Raza</th>
                        <th class="text-center">Propietario</th>
                        <th class="text-center">Informacion</th>
                        <?php if ($_SESSION["Rol"] == 1 || $_SESSION["Rol"] == 2): ?>
                            <th class="text-center">Acciones</th>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <?php foreach ($perros as $perro): ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <img class="img-thumbnail" src="<?php echo $perro[
                                        "FotoUrl"
                                    ]; ?>" alt="Foto" width="48" id="foto-<?php echo $perro["TatooId"]; ?>" />
                                </td>
                                <td class="text-center align-middle"><?php echo $perro["TatooId"]; ?></td>
                                <td class="text-center align-middle"><?php echo $perro["Apodo"]; ?></td>
                                <td class="text-center align-middle"><?php echo $perro["Raza"]; ?></td>
                                <td class="text-center align-middle">
                                    <?php echo $perro["NombrePropietario"]; ?>
                                </td>
                                <td class="text-center align-middle"><button class="btn btn-link" onclick='verObservacion(<?php echo json_encode(
                                    $perro
                                ); ?>)'>Click para ver</button></td>
                                <?php if ($_SESSION["Rol"] == 1 || $_SESSION["Rol"] == 2): ?>
                                    <td class="text-center align-middle">
                                        <button class="btn border" style="color:green" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" onclick='editarPerro(<?php echo json_encode(
                                            $perro
                                        ); ?>)'>
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <?php if ($_SESSION["Rol"] == 1): ?>
                                            <button class="btn border" style="color:red" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar" onclick="eliminarPerro(<?php echo $perro[
                                                "PerroId"
                                            ]; ?>)">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br> 
</body>

<?php include_once "../componentes/footer.php"; ?>
<?php include_once "../componentes/modals.php"; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/de1cdf12c2.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../../js/page_principal/scripts.js" type="module"></script>
<script src="../../../js/modulos/bootstrap/bootstrap.js" type="module"></script>

</html>
