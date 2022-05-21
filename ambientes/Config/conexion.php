<?php
     class Conexion {
          private static $conexion= NULL;

          //para usar mas de una base de datos
          private function __construct(){}

          public static function conectar(){

               //atributos clase 'default'
               $host = "127.0.0.1";
               $db= "ambientes";
               $root = "root";
               $password = "";

               $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;

               self::$conexion= new PDO("mysql:host=$host;dbname=$db","$root","$password",$pdo_options);

               return self::$conexion;
          }

          public static function desconectar(&$conexion){
            $conexion= NULL;
          }

     }
?>