<?php
    $titulo=$_POST['eliminar']??"";
    require 'DatosConexion.php';
            try{
                $conexion= mysqli_connect($servidorBD,$usuarioDB,$password);
                mysqli_select_db($conexion, $basedatos);
                $set_names="SET NAMES 'utf8'";
                mysqli_query($conexion,$set_names);
                $eliminacion_disco="DELETE FROM disco WHERE titulo='$titulo';";
                mysqli_query($conexion,$eliminacion_disco);
                mysqli_close($conexion);
            } catch (Exception $ex) {

            }
            header("location:taboa_disco.php");
            
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

