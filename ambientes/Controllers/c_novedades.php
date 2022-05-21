<?php

     require_once('../Models/m_novedades.php');

     require_once('../Models/Crud/crud_novedades.php');

     class C_novedades {
          public function __construct(){}

          //*------------------controlador listar ------------
          public function listarNovedades(){

               $Crud_novedad= new Crud_novedades();

               return $Crud_novedad->listarNovedades();

          }

                    //*------------------controlador registrar ------------
                    public function registrarNovedades(){//solo via de acceso (! parametros)

                        $Crud_novedad= new Crud_novedades();
         
                        $M_novedad = new M_novedades();
         
                        $M_novedad->set_idReporte('DEFAULT');
                        $M_novedad->set_idAmbiente($_POST['idAmbiente']);
                        $M_novedad->set_idTipoNovedad($_POST['idTipoNovedad']);
                        $M_novedad->set_descripcion($_POST['descripcion']);
                  
                        $mensaje= $Crud_novedad->registrarNovedades($M_novedad);
         
                        if($mensaje){
                           header("location:../Views/v_listarNovedades.php");
                        }
                   }

                              // *-----------------------controlador buscar---------------------
               public function buscarNovedades($Novedad){
                $Crud_novedad= new Crud_novedades();

                $M_novedad = new M_novedades();
                $M_novedad->set_idReporte($Novedad);

                $datosNovedades= $Crud_novedad->buscarNovedades($M_novedad);

                return  $datosNovedades;
           }

          // *-------------------------actualizar -------------------
          public function actualizarNovedades(){

            $M_novedad= new M_novedades();

            $M_novedad->set_idReporte($_POST['idReporte']);
            $M_novedad->set_idAmbiente($_POST['idAmbiente']);
            $M_novedad->set_idTipoNovedad($_POST['idTipoNovedad']);
            $M_novedad->set_descripcion($_POST['descripcion']);

            $Crud_novedad= new Crud_novedades();
            $Crud_novedad->actualizarNovedades($M_novedad);


            if($Crud_novedad){
                 header("Location: ../Views/v_listarNovedades.php");
            }

       }

               //-----------------eliminar-------------------
               public function eliminarNovedades($Novedad){
                $Crud_novedad= new Crud_novedades();
                $M_novedad = new M_novedades();
                $M_novedad->set_idReporte($Novedad);
    
                $mensaje= $Crud_novedad->eliminarNovedades($M_novedad);

                echo "<script>
                    alert('$mensaje');
                    document.location.href='../Views/v_listarNovedades.php';
    ;            </script>";
            }
    




                   // *-------------------desplegar vista ---------------------
                   public function desplegarVista($pagina, $id){

                    $idReporte= $id;
     
                    if($pagina && $idReporte == NULL){
                         header("location:../Views/".$pagina);
                    }
                    else{
                         header("location:../Views/$pagina?id_reporte=$idReporte");
                    }
               }
    
    }   


         // ?-------------validacion--------------------
         $C_novedad= new C_novedades();

    if (isset($_POST['registrar'])){
         $_POST['idAmbiente'];
         $_POST['idTipoNovedad'];
         $_POST['descripcion'];

         $C_novedad->registrarNovedades();

        }elseif (isset($_REQUEST['vRegistro'])) {
            $C_novedad->desplegarVista($_REQUEST['vRegistro'], NULL);
        }
        elseif(isset($_POST['editar'])){
            $idReporte= base64_encode($_POST['idReporte']);
            $C_novedad->desplegarVista('v_editarNovedades.php', $idReporte);
        }
        elseif(isset($_POST['actualizar'])){
            $C_novedad->actualizarNovedades();
        }
        else if (isset($_GET['eliminar'])) {
            $idReporte= $_REQUEST['idReporte'];
            $C_novedad->eliminarNovedades($idReporte);
        }
        // elseif (isset($_REQUEST['vRegistro'])) {
        //     $C_novedad->desplegarVista($_REQUEST['vRegistro']);   
        // }


?>