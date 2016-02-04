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
$photo = $_FILES['photo'];
$description = $_POST['description'];
$type = $_POST['typeIncident'];


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
    echo $_FILES['photo']['name'];
}

echo "<h2>PHOTO INDISPONIBLE</h2>";

$incident = new Incident($description, $type, $adresse, $severite, $reference, "");

/*** La connection à la DB ***/
$database = new Connection("localhost", "root", "root");
//$db = $database->getPDO();

$txt = "khra";
/*** L'insertion dans la table incident ***/

$count = $database->insertIntoIncident($incident, $txt);
echo $count;

/*** Déconnexion de la DB ***/
$database->closeConnection();

$html = "<br/><br/><button class=\"btn btn-success\" type=\"button\">Montrer les plaintes</button>";
echo $html;

/*
try {
    $db = new PDO("mysql:host=localhost;dbname=mysql", "root", "root") or die(print_r($db->errorInfo(), true));
    echo 'Connected to database';
} catch (PDOException $e) {
    echo $e->getMessage()."\n Erreur connection";
}
*/
/*** L'insertion dans la table incident ***/
/*try {
    $rqt = "INSERT INTO Mairie.Incident(Description, Type, Adresse, Severite, Reference, Image)
            VALUES ('$description', '$type', '$adresse', '$severite', '$reference','')";

    $count = $db->exec($rqt) or die(print_r($db->errorInfo(), true));
    echo 'Execution successfull'. "\n";
    }
catch (PDOException $e)
    {
    echo $e->getMessage() . "\n Erreur insertion";
    }



/*** Déconnexion de la DB ***/
/*
$db = null;
echo 'Discoonnected from database'. "\n";
*/

?>

</body>
</HTML>
