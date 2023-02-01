<?php

   
    class Conexion
    {

       
        private $mysqli = '';
        private $usuario = 'root';
        private $clave = '';
        private $server = 'localhost';
        private $db = 'login';


      
        public function conectar()
        {
          
            $this->mysqli = new mysqli($this->server, $this->usuario, $this->clave, $this->db);

            # Validacion
            if($this->mysqli->connect_errno)
            {
                # Muestra el Error
                echo 'Fallo al conectarse con MySQL: ' . $this->mysqli->connect_error;
            }

        }


        public function query($consulta)
        {
            return $this->mysqli->query($consulta);
        }

        # Funcion que verifica los registros de la consulta
        public function verificarRegistros($consulta)
        {
            # Obtiene los resultados de una consulta
            return $verificarRegistros = mysqli_num_rows($this->mysqli->query($consulta));
        }
        
        public function consultaArreglo($consulta)
        {
          
          return mysqli_fetch_array($this->mysqli->query($consulta));
        }

        
        public function cerrar()
        {
            
            $this->mysqli->close();
        }

        public function salvar($des)
        {
          
          $string = $this->mysqli->real_escape_string($des);

          return $string;
        }

        public function filtrar($string){

          $res = $this->salvar($string);

          $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
          $reemplazar = array('&aacute','&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');

          $res = str_replace($buscar, $reemplazar, $string);

          $res = strtolower($res);

          $res = trim($res);

          return $res;
        }

        public function rescatar($string)
        {

          $buscar = array('&aacute','&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');
          $reemplazar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');

          $res = str_replace($buscar, $reemplazar, $string);

          return $res;
        }

    } 

?>
