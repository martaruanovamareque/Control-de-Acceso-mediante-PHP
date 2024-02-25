<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar rexistro canción</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            body{
                background-color: aliceblue;
                text-align: center;
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
        </style>
    </head>
    <body>
        
        <form method="POST" action="">
        <?php
            $titulo=$_POST['modificar']??"";
            echo "<legend><h1>Modificar a canción seleccionada</h1></legend>";
        ?>     
            <table>
                 <tr>
                    <td><label for="modificar_titulo">Titulo novo:</label></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="modificar_titulo" name="modificar_titulo" <?php echo "value='$titulo'"; ?>>
                        <input type="text" class="olvidar" id="antigo_titulo" name="antigo_titulo" value="<?php echo "$titulo"; ?>" hidden>
                    </td>
                </tr>
                <tr>
                    <td><label for="modificar_grupo">Grupo:</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="modificar_grupo" name="modificar_grupo"></td>
                </tr>
                <tr>
                    <td><label for="modificar_disco">Disco:</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="modificar_disco" name="modificar_disco"></td>
                </tr>
                <tr>
                    <td><label for="modificar_ano">Ano:</label></td>
                </tr>
                <tr>
                    <td><input type="number" id="modificar_ano" name="modificar_ano"></td>
                </tr>
                <tr>
                    <td><label for="modificar_duracion">Duración:</label></td>
                </tr>
                <tr>
                    <td><input type="number" id="modificar_duracion" name="modificar_duracion"></td>
                </tr>
                <tr>
                    <td><br><input type="submit" value="Enviar"></td>
                </tr>
            </table>
        </form>
        <?php
           
            $old_titulo=$_POST['antigo_titulo']??"";
            $novo_titulo=$_POST['modificar_titulo']??"";
            $grupo=$_POST['modificar_grupo']??"";
            $disco=$_POST['modificar_disco']??"";
            $ano=$_POST['modificar_ano']??"";
            $duracion=$_POST['modificar_duracion']??"";
            require 'DatosConexion.php';
            try{
                $conexion= mysqli_connect($servidorBD,$usuarioDB,$password);
                mysqli_select_db($conexion, $basedatos);
                $set_names="SET NAMES 'utf8'";mysqli_query($conexion,$set_names);
                $modificacion_disco="UPDATE disco SET titulo='$novo_titulo', grupo='$grupo', disco='$disco', ano='$ano', duracion='$duracion' WHERE titulo='$old_titulo'";
                $columnas=mysqli_query($conexion,$modificacion_disco);
                mysqli_close($conexion);
            } catch (Exception $ex) {

            }
        ?>
        <hr>
        <p><form method="post" action="taboa_disco.php">
            <input type="submit" value="<-Volver á páxina principal">
        </form></p>
    </body>
</html>
