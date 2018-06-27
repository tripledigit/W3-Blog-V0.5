<?php

//maak een tijd-variabele met opmaak
$tijda=time();
$tijdb=(date("D-d-M-Y-H:i",$tijda));
  //echo $tijdb;

          $tela = $_POST["nummer"];
          //echo $tela . "\n" . "<br>";
          $komments = $_POST["kommentinvoer"];
          $kommentaarnr = fopen("Blogfileb/komment" . $tela . ".txt", "a");
          fwrite($kommentaarnr, $tijdb . "\n" . "<br>" . $komments . "\n" . "<br>");
          fclose("$kommentaarnr");

$test = (file_get_contents("Blogfileb/komment" . $tela . ".txt"));
echo $test;


//maak stringvariabele met de kommentaartekst aan
//$kommentteksta=$_POST["komment" . $tela];
//echo $kommentteksta;



?>
<!DOCTYPE html>
<html>
  <body>
    <p>Klik om naar de <a href="bloglees_form.php">leespagina</a> te gaan!</p>
    <br><br>
  </body>
</html>
