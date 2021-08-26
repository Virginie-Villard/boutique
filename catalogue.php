<?php

// Ma fonction afficheCatalogue se trouve dans la page functions. 
//Elle affiche l'article et contient aussi le formulaire qui permet d'entrer la quantité de chaque article dans le catalogue.

//articlesBdd();

// require('class.php');

// _____________________________________________________________________________

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'virginie.villard','OEvirg86!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
// On récupère tout le contenu de la table article de notre boutique
$reponse = $bdd->query('SELECT * FROM article');

$catalogue = new Catalogue;

while ($donnees = $reponse->fetch()) {
    $catalogue->articleList[]= new Article($donnees['IDArticle'], $donnees['name'], $donnees['description'], $donnees['Price'], $donnees['Image'], $donnees['Poids'], $donnees['StockMagasin'], $donnees['disponible'], $donnees['enVente'], $donnees['Categorie']);
}
$reponse->closeCursor();

$catalogue->displayCat();

// // J'instancie mon article1
// $article1 = new Article (1, "PHP pour les nulls", "Apprenez le PHP facilement !", 20, "https://images-na.ssl-images-amazon.com/images/I/41aL8HZndgL._SX340_BO1,204,203,200_.jpg", 1000, 108, 1, 1, 1);
//     // $article1->ID = 1;
//     // $article1->Nom = "PHP pour les nulls";
//     // $article1->Description = "Apprenez le PHP facilement !";
//     // $article1->Prix = 20;
//     // $article1->Image = "https://images-na.ssl-images-amazon.com/images/I/41aL8HZndgL._SX340_BO1,204,203,200_.jpg";
//     // $article1->Poids = 1000;
//     // $article1->Stock = 108;
//     // $article1->Disponible = 1;
//     // $article1->EnVente = 1;
//     // $article1->Categorie = 1;
//     $article1->displayArticle();




?>



