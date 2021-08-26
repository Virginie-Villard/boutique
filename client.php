<?php

// require('class.php');

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'virginie.villard','OEvirg86!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
// On récupère tout le contenu de la table user de notre boutique
$reponse = $bdd->query('SELECT * FROM user');

$client = new CatalogueClient;

while ($donnees = $reponse->fetch()) {
    $client->clientList[]= new Client($donnees['IDUser'], $donnees['Name'], $donnees['LastName'], $donnees['Adress'], $donnees['Postcode'], $donnees['City'], $donnees['eMail'], $donnees['Image']);
}
$reponse->closeCursor();

$client->displayClient();

?>