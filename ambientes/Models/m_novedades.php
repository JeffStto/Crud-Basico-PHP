<?php
    class M_novedades {
          private $idReporte;
          private $idAmbiente;
          private $idTipoNovedad;
          private $descripcion;
          private $fechaRegistro;

         public function __construct(){

         }

        // *------------ setter ------------------
          public function set_idReporte($idReporte){
            $this->idReporte = $idReporte;
          }

          public function set_idAmbiente($idAmbiente){
            $this->idAmbiente = $idAmbiente;
          }

          public function set_idTipoNovedad($idTipoNovedad){
            $this->idTipoNovedad = $idTipoNovedad;
          }

          public function set_descripcion($descripcion){
            $this->descripcion = $descripcion;
          }

          public function set_fechaRegistro($fechaRegistro){
            $this->fechaRegistro = $fechaRegistro;
          }


        //*------------- getter --------------
          public function get_idReporte(){
            return $this->idReporte;
          }

          public function get_idAmbiente(){
            return $this->idAmbiente;
          }

          public function get_idTipoNovedad(){
            return $this->idTipoNovedad;
          }

          public function get_descripcion(){
            return $this->descripcion;
          }

          public function get_fechaRegistro(){
            return $this->fechaRegistro;
          }

    }
?>