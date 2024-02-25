<?php session_start() ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            body{
                margin: 10px 10px;
            }
            label{
                font-size: 16px;
            }
            input{
                padding: 14px 20px;
                margin: 8px 0;
                border-radius: 4px;
                font-size: 16px;
            }
            input[type="submit"] {
                background-color: black;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: white;
                color: black;
            } 
        </style>
    </head>
    <body>
        <?php
            $nome_usuario=$_POST['nome_usuario']??"";
            $contrasinal_usuario=$_POST['contrasinal']??"";
            $error=[];
            $nome_usuario= filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING)??"";
            if(empty($nome_usuario)){
               $error="O usuario é requerido";
            }
         
            if($_POST){
                require 'DatosConexion.php';
                try{
                    $conexion= mysqli_connect($servidorBD,$usuarioDB,$password);
                    mysqli_select_db($conexion, $basedatos);
                    $set_names="SET NAMES 'utf8';";
                    mysqli_query($conexion, $set_names);
                    $consulta="SELECT * FROM usuarios;";
                    $resultado=$conexion->query($consulta);
                    while($usuarios_hash= $resultado->fetch_assoc()){
                        $usuario=$usuarios_hash['nome_usuario'];
                        $hash=$usuarios_hash['contrasinal'];
                        $permisos=$usuarios_hash['permisos'];
                        $rol=$usuarios_hash['rol'];
                        if($nome_usuario==$usuario){
                            if(password_verify($contrasinal_usuario, $hash)){
                                $_SESSION['Nome']="$usuario";
                                $_SESSION['Tempo']=time();
                                $_SESSION['Permisos']="$permisos";
                                $_SESSION['Rol']="$rol";
                                $ficheiro="rexistro.txt";
                                $informacion = "O usuario $usuario conectouse o ". date("Y-m-d H:i:s"). "\n";
                                file_put_contents($ficheiro, $informacion, FILE_APPEND);
                                header("Location:taboa_disco.php");
                            }else{echo"<p>Uusuario/contrasinal non existe</p>";}
                        }else{echo"<p>Uusuario/contrasinal non existe</p>";}   
                    }
                    mysqli_close($conexion);
                } catch (Exception $ex) {
                }
            } 
        if(!isset($_SESSION['Nome'])){
        ?>
        <p><a href="taboa_disco.php">Usuarios Rexistrados</a></p>
        <form method="POST" action="">
            <h1>Iniciar sesión:</h1>
            <table>
                <tr>
                    <td>
                        <label for="nome_usuario">Usuario:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="nome_usuario" name="nome_usuario" maxlength="40">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="constrasinal">Contrasinal:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" id="constrasinal" name="contrasinal" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <input type="submit" value="Iniciar">
                    </td>
                </tr>
            </table>
        </form>
        <?php
           }
      
            else{   echo"<p>Identidade verificado</p>";   echo"<p>Identidade verificado</p>";} 
        ?>
    </body>
</html>
