<?php
// Se incluye la conexion a la BDD.
include "../../pdo.php";

$propietariosId = $_POST["propietarioId"];

// Queries para borrar al propietario del perro de PropietariosPerros
// Y para borrar al perro de Perros
$deletePropietario =
    "DELETE FROM Propietarios WHERE PropietarioId = :propietarioId";

$params = ["propietarioId" => $propietariosId];

try {
    $resultPropietario = $pdo->prepare($deletePropietario)->execute($params);
} catch (\Throwable $th) {
    echo "Hubo un error al intentar eliminar un propietario.";
    throw new Error();
}

die();
