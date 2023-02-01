<?php

  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $clave  = $_POST['clave'];
  $clave2 = $_POST['clave2'];

  if(empty($email) || empty($clave) || empty($clave2))
  {

    echo 'error_1';

  }else{

    if($clave == $clave2){

      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        
        require_once('../model/usuario.php');
        
        $usuario = new Usuario();

        $usuario -> registroUsuario($name, $email, $clave);


      }else{
        echo 'error_4';
      }


    }else{
      echo 'error_2';
    }

  }




?>
