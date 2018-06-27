<!DOCTYPE html>
<html>
  <body>
    <p>Blog post is gelukt!</p>
    <p>Klik op de link om terug te keren naar de <a href="bloglees_form.php">leespagina</a></p>
    <br><br>
  </body>
</html>

<?php

//pak stringvariabelen uit html en zet deze in PHP stringvariabelen
  $naama=$_POST["naam"];
  $blogtitela=$_POST["blogtitel"];
  $blogteksta=$_POST["blogtekstinvoer"];

//maak een tijd-variabele met opmaak
  $tijda=time();
  $tijdb=(date("D-d-M-Y-H:i",$tijda));

  //Check if the file is well uploaded
	if($_FILES["file"]["error"] > 0) { echo "Fout tijdens uploaden, probeer opnieuw"; }
	//We won't use $_FILES['file']['type'] to check the file extension for security purpose
	//Set up valid image extensions
	$extsAllowed = array( "jpg", "jpeg", "png", "gif" );
	//Extract extention from uploaded file
		//substr return ".jpg"
		//Strrchr return "jpg"
	$extUpload = strtolower( substr( strrchr($_FILES["file"]["name"], ".") ,1) ) ;
	//Check if the uploaded file extension is allowed
	if (in_array($extUpload, $extsAllowed) ) {
	//Upload the file on the server
  $name = "uploads/{$_FILES["file"]["name"]}";
	$result = move_uploaded_file($_FILES["file"]["tmp_name"], $name);
	if($result){echo "";}  //<img src='$name'/>
} else { echo "Bestand is ongeldig. Probeer opnieuw"; }
//$block geeft aan of kommentaren wel- of niet mogen.
  $block = "J";

//Maak telbestand aan als deze nog niet bestaat
//lees inhoud telbestand in variabele
//zet de telwaarde in het telbestand -hiermee kan ik elke keer een genummerd kommentaarbestand koppelen aan het blognummer
fopen("Blogfileb/telbestand.txt", "a");
fclose("Blogfileb/telbestand.txt");
$tela = (file_get_contents("Blogfileb/telbestand.txt"));
fopen("Blogfileb/telbestand.txt","w");
fclose("Blogfileb/telbestand.txt");
$tela = $tela + "1" ;
echo $tela ;
$teller = fopen("Blogfileb/telbestand.txt","w");
fwrite($teller, $tela);
fclose("Blogfileb/telbestand.txt");
//Maak nieuw kommentaarbestand met gebruik van nummer in TELbestand
//$kommentaarnr = ("Blogfileb/komment" . $tela . ".txt");
//echo $kommentaarnr;
// voor testen gebruikt   $tekst = "Dit is een test";
//fopen("$kommentaarnr","a");
$kommentaarnr = fopen("Blogfileb/komment" . $tela . ".txt", "a");
// voor testen gebruikt   fwrite($kommentaarnr, $tekst);
// voor testen gebruikt   fclose("$kommentaarnr");

  //

    //maak een reageertag met uniek nummer ($stela) die in elke blogtekst moet komen
   //  even bewaren just in case, anders mag hij weg $rbutton = "<h5 id=\"$tela\">Reageer op de tekst</h5> <input type = \"button\" value = \"Reageer\" onclick = \"reageerform.php\">";
   $rbutton = "<form id=\"komment$tela\" name=\"komment$tela\" class = \"komment$tela\" action=\"phpkommentscript.php\" method=\"post\"> <br>
                Artikelnummer-$tela <br>
                Reageer op dit artikel: <br>
                <input type = \"hidden\"  id=\"nummer\" name=\"nummer\" value=\"$tela\">
                <textarea  id=\"kommentinvoer\" name=\"kommentinvoer\" cols=\"30\" rows=\"8\" ></textarea>
                <br><br> <input type = \"button\" onclick = \"submit()\" value = \"Verstuur\"> </form>";

//deze regel maakt een variabele met de inhoud van het kommentaatbestand werkt helaas niet
  //$textbuffera = "file_get_contents(\"Blogfileb/komment $tela .txt\"))";


    //schrijffunctie met opmaak en gegenereerde tijd
    $schrijfweg = fopen("Blogfileb/" . $tela . ".txt", "a") or die("Kan bestand niet openen!");
    fwrite($schrijfweg,     "\n" . "<br>" . "Reacties aan? - " . $block
                          . " Blognummer: " . $tela . "\n" . "<br>"
                          . "Datum:" . " " . $tijdb . "\n" . "<br>"
                          . "Auteur:" . " " . $naama . "\n" . "<br>"
                          . "Onderwerp:" . " " . $blogtitela . "\n". "<br>"
                          . "<img src='$name'/>" . " " . "\n" . "<br>"
                          . $blogteksta . "\n" . "<br>"
                          . $rbutton
                          . "<h3> Reacties: </h3>");
    fclose($schrijfweg);
//zet de inhoud van het laatste blogfile op scherm
$naarhtmla = (file_get_contents("Blogfileb/" . $tela . ".txt"));
echo $naarhtmla;

?>

<!DOCTYPE html>
<html>
  <body>
    <p>Blog post is gelukt!</p>
    <p>Klik op de link om terug te keren naar de <a href="bloglees_form.php">leespagina</a></p>
  </body>
</html>
