<!DOCTYPE html>
<html lang="en">
<head>
    <link href="ressource/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Mohamed-Amine
 * Date: 25/01/2016
 * Time: 08:34
 */
include "entity/Connection.php";
include "entity/Incident.php";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$numero = $_POST['numero'];
$severite = $_POST['optionsRadios'];

$description = $_POST['description'];
$type = $_POST['typeIncident'];

//$photo = $_FILES['photo'];
echo basename($_FILES["photo"]["name"]);

$info = pathinfo($_FILES['photo']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "$nom"."_photoIncident.".$ext;

$target = 'ressource/photo/'.$newname;
move_uploaded_file( $_FILES['photo']['tmp_name'], $target);

//$target_Path = "ressource/photo/";
//$target_Path = $target_Path.basename( $_FILES['photo']['name'] );
//move_uploaded_file( $_FILES['photo']['tmp_name'], $target_Path );
//

if (isset($_POST['check_web']))
    $reference = $_POST['check_web'];
if (isset($_POST['check_tel']))
    $reference = $_POST['check_tel'];
if (isset($_POST['check_email']))
    $reference = $_POST['check_email'];

echo "<h1>Recuperation variables</h1>";
echo "Nom : {$nom} <br />";
echo "Prénom : {$prenom} <br />";

echo "Adresse : {$adresse} <br />";
echo "Type : {$type} <br />";
echo "Description : {$description} <br />";
echo "severite : {$severite} <br />";
echo "Référence : {$reference} <br />";

if (isset($_FILES['photo'])) {
    echo "Photo : ".$_FILES['photo']['name'];
}



$incident = new Incident($description, $type, $adresse, $severite, $reference, $target);

/*** La connection à la DB ***/
$database = new Connection("localhost", "root", "root");

/*** L'insertion dans la table incident ***/
$count = $database->insertIntoIncident($incident);
echo $count;

/*** Déconnexion de la DB ***/
$database->closeConnection();

$html = "<br/><br/><button class=\"btn btn-success\" type=\"button\" onclick=\"window.location.href='Display.php'\">Montrer les plaintes</button>";
echo $html;


?>

</body>
</HTML>
