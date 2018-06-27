<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BLOGuitvoer</title>
    <!--<script src = "blogjs.js"></script>-->
</head>
  <body>
     <p>Klik om naar <a href="index_form.html">beginpagina</a> te gaan</p><br>
     <h1>BLOGuitvoer v0.3</h1><br><br><br>


<?php

          //lees de telstand uit het telbestand en echo de inhoud van de bijbehorende blog- en kommentaar bestanden naar de pagina
          $tela = (file_get_contents("Blogfileb/telbestand.txt"));
          while ($tela > 0) {
                $output = (file_get_contents("Blogfileb/" . $tela . ".txt"));
                $outputk = (file_get_contents("Blogfileb/komment" . $tela . ".txt"));
                echo $output;
                echo $outputk;
          --$tela;
          }
?>
    <br><br>
    <p>Klik om naar <a href="index_form.html">beginpagina</a> te gaan</p>
  </body>
</html>
