<?php

    require_once('../Controllers/c_novedades.php');

    $idReporte= $_GET['id_reporte'];
    $idReporte= base64_decode($_GET['id_reporte']);

    // echo $idPaciente;

     $C_novedad= new C_novedades();
     $BuscarNovedad= $C_novedad->buscarNovedades($idReporte);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Novedades</title>
</head>
<body>
    <form action="../Controllers/c_novedades.php" method="POST">
        <h1>Editar Novedad</h1>

        <input type="text" name="idReporte" id="idReporte"  value="<?=$BuscarNovedad[0] ?>" readonly>

        <input type="text" name="idAmbiente" id="idAmbiente"  value="<?=$BuscarNovedad[1] ?>" >

        <input type="text" name="idTipoNovedad" id="idTipoNovedad"  value="<?=$BuscarNovedad[2] ?>">

        <input type="text" name="descripcion" id="descripcion"  value="<?=$BuscarNovedad[3] ?>" >

        <input type="text" name="FechaRegistro" id="FechaRegistro"  value="<?=$BuscarNovedad[4] ?>">

        <button type="submit" name="actualizar">Actualizar</button>
    </form>
</body>
</html>