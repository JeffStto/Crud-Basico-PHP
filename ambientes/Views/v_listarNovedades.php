<?php
     require_once('../Controllers/c_novedades.php');


     $C_novedad= new C_novedades();
     $C_novedad->listarNovedades();
     $ListaNovedades= $C_novedad->listarNovedades();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/Assets/css/jquery.dataTables.min.css">
    <title>Listar Novedades</title>
</head>
<body>
    <table id="example" class="display" style="width:100%">
       <thead>
           <tr>
               <th bgcolor="blue">Nº REPORTE</th>
               <th bgcolor="yellow">AMBIENTE</th>
               <th bgcolor="yellow">TIPO_NOVEDAD</th>
               <th bgcolor="yellow">DESCRIPCION</th>
               <th bgcolor="yellow">FECHA_REGISTRO</th>
               <th bgcolor="yellow">ACCIONES</th>
           </tr>
       </thead>
       <tbody>

               <a href="../Controllers/c_novedades.php?vRegistro=v_registrarNovedades.php">Registrar_Novedad</a>
               <br>
               <br>

            <?php

                foreach ($ListaNovedades as $novedad){

                    echo "<tr>";
                        echo "<td align='center'>".$novedad['idReporte']."</td>";
                        // if ($novedad['idAmbiente'] == 1) {
                        //     $novedad['idAmbiente']= 'Programacion';
                        // }else {
                        //     $novedad['idAmbiente']= 'Diseño';
                        // }
                        echo "<td>".$novedad['descripscion']."</td>";
                        // if ($novedad['idTipoNovedad'] == 1) {
                        //     $novedad['idTipoNovedad']= 'Urgente';
                        // }else {
                        //     $novedad['idTipoNovedad']= 'Importante';
                        // }

                        echo "<td>".$novedad['nombre']."</td>";
                        echo "<td>".$novedad['descripcion']."</td>";
                        echo "<td align='center'>".$novedad['fechaRegistro']."</td>";
                         echo "<td>
                             <form action='../Controllers/c_novedades.php' method='POST'>
                                 <center>
                                     <input type='hidden' name='idReporte' value=".$novedad['idReporte'].">
                                    <button type='submit' name='editar'>Editar</button>                  
                                 </center>
                             </form>";
                             echo "<center><a href='#' onclick='validarEliminacion($novedad[idReporte])'>Eliminar</a></center>";
                             echo "</td>";

                         echo "<td>";
                        echo "</tr>";
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
               <th bgcolor="black"></th>
               <th bgcolor="black"></th>
               <th bgcolor="black"></th>
               <th bgcolor="black"></th>
               <th bgcolor="black"></th>
               <th bgcolor="black"></th>
            </tr>
        </tfoot>
    </table>
    <script>
        function validarEliminacion(idReporte) {
            let eliminar= "";
            if (confirm('¿Esta seguro de eliminar la novedad?'));
            document.location.href= "../Controllers/c_novedades.php?idReporte="+idReporte+'&eliminar';
        }
    </script>

    <script src="../Public/Assets/js/jquery-3.5.1.js"></script>
    <script src="../Public/Assets/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        } );
    </script>
</body>
</html>