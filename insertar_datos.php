<?php
    $errores=[];
    $titulo=filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING)??"";
    if(empty($titulo)){
        $errores="O título é requerido";
    }
    $grupo=filter_input(INPUT_POST, 'grupo', FILTER_SANITIZE_STRING)??"";
    if(empty($grupo)){
        $errores="O grupo é requerido";
    }
    $disco=filter_input(INPUT_POST, 'disco', FILTER_SANITIZE_STRING)??"";
    if(empty($disco)){
        $errores="O disco é requerido";
    }
    $ano=filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT)??"";
    if(empty($ano)){
        $errores="O ano é requerido";
    }
    $duracion=filter_input(INPUT_POST, 'duracion', FILTER_SANITIZE_NUMBER_INT)??"";
    if(empty($duracion)){
        $errores="A duración é requerido";
    }
    $titulo=$_POST['titulo']??"";
    $grupo=$_POST['grupo']??"";
    $disco=$_POST['disco']??"";
    $ano=$_POST['ano']??"";
    $duracion=$_POST['duracion']??"";
    require 'DatosConexion.php';
     try{
            $conexion= mysqli_connect($servidorBD,$usuarioDB,$password);
            mysqli_select_db($conexion, $basedatos);
            $set_names="SET NAMES 'utf8'";
            mysqli_query($conexion,$set_names);
            $sentencia_insert="INSERT INTO disco VALUES ('$titulo','$grupo','$disco','$ano','$duracion')";
            mysqli_query($conexion,$sentencia_insert);
            mysqli_close($conexion);
        } catch (Exception $ex) {

        }
        header("location:taboa_disco.php");
            
        

