<?php
     require_once ('../Config/conexion.php');

     class Crud_novedades {

          // *----------------------------listar---------------------------
          public function listarNovedades()
          {
               //:: para retornos de funciones(static) cuando new metodo no es static, -> (ir a )
               $db= Conexion::conectar();

               $sql= $db->query('SELECT ambientes.descripscion, tiposnovedad.nombre, novedades.* FROM novedades
               INNER JOIN  ambientes on novedades.idAmbiente = ambientes.idAmbiente
               INNER JOIN  tiposnovedad on novedades.idTipoNovedad = tiposnovedad.idTipoNovedad
               order by idReporte asc');

               $sql->execute();

               Conexion::desconectar($db);

               return ($sql->fetchAll());
          }

        //   ----------------------------registrar-----------------------------------

          public function registrarNovedades($Novedad){//objeto guia
            $mensaje= "";

            $db= Conexion::conectar();

            $sql= $db->prepare("INSERT INTO novedades(idReporte, idAmbiente, idTipoNovedad, descripcion, fechaRegistro)
            VALUES (:idReporte, :idAmbiente,  :idTipoNovedad, :descripcion, NOW())");

            $sql->bindValue('idReporte', '');
            $sql->bindValue('idAmbiente', $Novedad->get_idAmbiente());
            $sql->bindValue('idTipoNovedad', $Novedad->get_idTipoNovedad());
            $sql->bindValue('descripcion', $Novedad->get_descripcion());

            try{
                 $sql->execute();
                 $mensaje= "registro exitoso";
                 }
                 catch (Exepcion $e){
                 $mensaje= $e->getMessage();
                 }

                Conexion::desconectar($db);

                 return $mensaje;
            }

          // *---------------------------buscar-----------------------
          public function buscarNovedades($Novedad){

            $db= Conexion::conectar();

            $sql= $db->query('SELECT * FROM novedades WHERE idReporte ='.$Novedad->get_idReporte());

            $sql->execute();

            Conexion::desconectar($db);

            return $sql->fetch();
      }


              // *-----------------------actualizar---------------------
              public function actualizarNovedades($Novedad){
                $mensaje= "";
   
                $db= Conexion::conectar();
   
               $sql= $db->prepare('UPDATE
               novedades SET idAmbiente=:idAmbiente, idTipoNovedad=:idTipoNovedad, descripcion=:descripcion WHERE idReporte=:idReporte');
   
               $sql->bindValue('idReporte', $Novedad->get_idReporte());
               $sql->bindValue('idAmbiente', $Novedad->get_idAmbiente());
               $sql->bindValue('idTipoNovedad', $Novedad->get_idTipoNovedad());
               $sql->bindValue('descripcion', $Novedad->get_descripcion());
   
               try{
                   $sql->execute();
   
                   $mensaje= "actualizacion exitosa";
               }
               catch (Exepcion $e){
                  $mensaje= $e->getMessage();
               }
   
               Conexion::desconectar($db);
   
               return $mensaje;
             }
   

            //  ---------------------eliminar----------------------
             public function eliminarNovedades($Novedad){
                $mensaje= "";
    
                //establecer conexion a db
                $db= Conexion::conectar();
    
                //preparar sentencia sql
               $sql= $db->prepare('DELETE FROM
               --  : = parametros para asignar valores a values
                 novedades WHERE idReporte= :idReporte');
    
                //asignar valores a parametros para : (de un value)
               $sql->bindValue('idReporte', $Novedad->get_idReporte());
    
               //verificacion
               try{
                   $sql->execute(); //ejecutar sql
                   $mensaje= "eliminacion exitosa";
               }
               //mostrar errores del try
               //capturar exepciones de la transaccion sql (Exepcion)
               catch (Exepcion $e){
                  $mensaje= $e->getMessage(); //obtener mensaje error
               }
    
               Conexion::desconectar($db);
               return $mensaje;
            }
    
}