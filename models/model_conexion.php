<?php
    // Clase Conexion
    class class_conexion{

        //========== Atributos ==========//
        private $host; //Host
        private $db; //Base de dato
        private $user; //Usuario
        private $psw; //Contraseña

        public $conection;
        public $disconection;

        //========== Metodos ==========//
        function __construct(){
            $this->host = "localhost";
            $this->db   = "0800mujer";
            $this->user = "osti";
            $this->psw  = "s";
        }

        //Conectarse a la BD
        function conectar(){
            $this->conection = mysqli_connect($this->host, $this->user, $this->psw, $this->db);
            mysqli_query($this->conection, "SET NAMES 'uft8'");
        }

        //Desconectarse de la BD
        function desconectar(){
            $this->disconection = mysqli_close($this->conection);
        }
    }
?>