<?php session_start() ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forms + DB</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            body{
                background-color: aliceblue;
                text-align: center;
                margin: 10px 10px;
            }
            table,tr,td,th{
                margin: auto;
            }
            .modificacion{
                background-color: #04AA6D;
            }
            .eliminacion{
                background-color: #e35a67;
            }
            .sesiones{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <?php
            if(!isset($_SESSION['Nome'])){  
                die("<p style='background-color:red;'>Non tes permiso para visualizar esta páxina");
            }
            echo "<p class='sesiones'>". $_SESSION['Nome'].", ". $_SESSION['Rol']." | <a href='peche.php'>Pechar a sesión</a></p>";
            if($_SESSION['Permisos']==11){
        ?>
        <form method="POST" action="insertar_datos.php">
            <legend><h1>Engadir disco:</h1></legend>
            <table>
                <tr>
                    <td><label for="titulo">Título:</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="titulo" name="titulo"></td>
                </tr>
                <tr>
                    <td><label for="grupo">Grupo:</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="grupo" name="grupo"></td>
                </tr>
                <tr>
                    <td><label for="disco">Disco:</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="disco" name="disco"></td>
                </tr>
                <tr>
                    <td><label for="ano">Ano:</label></td>
                </tr>
                <tr>
                    <td><input type="number" id="ano" name="ano"></td>
                </tr>
                <tr>
                    <td><label for="duracion">Duración:</label></td>
                </tr>
                <tr>
                    <td><input type="number" id="duracion" name="duracion"></td>
                </tr>
                <tr>
                    <td><br><input type="submit" value="Enviar"></td>
                </tr>
            </table>
        </form>
        <br><br>
        
        <?php
            require 'DatosConexion.php';
            try{
                $conexion= mysqli_connect($servidorBD,$usuarioDB,$password);
                mysqli_select_db($conexion, $basedatos);
                $set_names="SET NAMES 'utf8'";
                mysqli_query($conexion,$set_names);
                $sentencia_sql_1="SELECT COLUMN_NAME FROM information_schema.columns WHERE TABLE_NAME='disco'";
                $columnas=mysqli_query($conexion,$sentencia_sql_1);
                $sentencia_sql_2="SELECT * FROM disco";
                $datos= mysqli_query($conexion, $sentencia_sql_2);
                echo "<table border>";
                echo "<tr>";
                while($fila= mysqli_fetch_array($columnas, MYSQLI_ASSOC)){
                    foreach ($fila as $valor) {
                        echo "<th>$valor</th>";
                    }
                }
                echo "<th>seleccionado</th></tr>";
                while($fila= mysqli_fetch_array($datos, MYSQLI_ASSOC)){
                    echo "<tr>";
                    foreach ($fila as $valor) {
                        echo "<td>$valor</td>";
                    }
                    $valor_linha=$fila['titulo'];
                    echo "<td>";
                    echo "<button form='form_modificar' class='modificacion' type='submit' name='modificar' value='$valor_linha'>Modificar</button>";
                    echo "<button form='form_eliminar' class='eliminacion' type='submit' name='eliminar' value='$valor_linha'>Eliminar</button>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<form id='form_modificar' method='POST' action='modificar.php'></form><form id='form_eliminar' method='POST' action='eliminar.php'></form>";
                }
                echo "</table>";
                mysqli_close($conexion);
            } catch (Exception $ex) {

            }
            } else {
        ?>
         <?php
               require 'DatosConexion.php';
            try{
                $conexion= mysqli_connect($servidorBD,$usuarioDB,$password);
                mysqli_select_db($conexion, $basedatos);
                $set_names="SET NAMES 'utf8'";
                mysqli_query($conexion,$set_names);
                $sentencia_sql_1="SELECT COLUMN_NAME FROM information_schema.columns WHERE TABLE_NAME='disco'";
                $columnas=mysqli_query($conexion,$sentencia_sql_1);
                $sentencia_sql_2="SELECT titulo,grupo,disco,ano,duracion FROM disco";
                $datos= mysqli_query($conexion, $sentencia_sql_2);
                echo "<table border>";
                echo "<tr>";
                while($fila= mysqli_fetch_array($columnas, MYSQLI_ASSOC)){
                    foreach ($fila as $valor) {
                        echo "<th>$valor</th>";
                    }
                }
                while($fila2= mysqli_fetch_array($datos, MYSQLI_ASSOC)){
                    echo "<tr>";
                    foreach ($fila2 as $valor) {
                        echo "<td>$valor</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($conexion);
                } catch (Exception $ex) {

            }
            }
        ?>
    </body>
</html>
