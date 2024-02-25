<?php session_start() ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pechar Sesión</title>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <style>body{margin: 10px 10px;}
             </style>
    </head>
    <body>
        <?php
        $tempoFinalSesion=time() - $_SESSION['Tempo'];
        $ficheiro="rexistro.txt";
        $informacion_peche = "O usuario ". $_SESSION['Nome']. " estivo conectado $tempoFinalSesion segundos". "\n";
        file_put_contents($ficheiro, $informacion_peche, FILE_APPEND);
        $_SESSION=[];
        session_unset();
        session_destroy();
        setcookie(session_name(),'',0,'/');
        header("Location:index.php");
        ?>
    </body>
</html>