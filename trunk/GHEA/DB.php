<?php

    class DB
    {
        private $host;
        private $user;
        private $password;
        private $DBname;
        private $conexion;
        
        public function setHost($host)
        {
            $this->host = $host;
        }
    
        public function setUser($user)
        {
            $this->user = $user;
        }
    
        public function setPassword($password)
        {
            $this->password = $password;
        }
    
        public function setDBname($dbname)
        {
            $this->dbname = $dbname;
        }
        
        public function setConexion($conexion)
        {
            $this->conexion = $conexion;
        }
        
        public function getHost()
        {
            return $this->host;
        }
    
        public function getUser()
        {
            return $this-> user;
        }
    
        public function getPassword()
        {
            return $this->password;
        }
    
        public function getDBname()
        {
            return $this->dbname;
        }
    
        public function getConexion()
        {
           return $this->conexion;
        }
        
        public function __construct() 
        {
            $this->setHost('localhost');
            $this->setUser('root');
            $this->setPassword('ghea');
            $this->setDBname('ghea');
            $this->conexion = mysql_connect($this->getHost(),$this->getUser(),$this->getPassword());//usuario y contrase�a
            if (!$this->conexion) 
            {
                die('No pudo conectarse a la Base de Datos: ' . mysql_error());
            }
            else
            {
                mysql_select_db($this->getDBname(), $this->conexion);//nombre de la base de datos
            }
    
            return $this->conexion;
        }  

        public function __destruct() 
        {
             mysql_close($this->conexion);    
        }
        
        public function consultar($stringConsulta)
        {
            $resultado = mysql_query($stringConsulta);
            return $resultado;
        }
        
        public function insertar($stringInsertar)
        {
            $resultado = mysql_query($stringInsertar);
            return $resultado;
        }
        
        public function modificar($stringModificar)
        {
            $resultado = mysql_query($stringModificar);
            return $resultado;
        }
        public function eliminar($stringEliminar)
        {
            $resultado = mysql_query($stringEliminar);
            return $resultado;
        }
    }
?>
