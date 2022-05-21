<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Novedades</title>
</head>
<body>
    <form action="../Controllers/c_novedades.php" method="POST">
        <h1>Registrar Novedades</h1>
        <input type="hidden" name="idReporte" id="idReporte">
        <select name="idAmbiente">
            <option >_Seleccione tipo de ambiente_</option required>
            <option value="1">Programacion</option>
            <option value="2">Diseño</option>
        </select>

        <select name="idTipoNovedad">
            <option >_Seleccione tipo de novedad_</option required>
            <option value="1">Urgente</option>
            <option value="2">Importante</option>
        </select>

        <textarea name="descripcion" id="descripcion"></textarea>

        <button type="submit" name="registrar">Registrar</button>
    </form>
</body>
</html>