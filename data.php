<?php

// //Ma base se données (Mon catalogue d'articles)

// $books = [
// 	[
// 		"id" => 1,
// 		"name" => "PHP pour les Nuls",
// 		"price" => 20,
// 		"image" => "./images/php.jpg"
// 	],
// 	[
// 		"id" => 2,
// 		"name" => "Programmer pour les Nuls",
// 		"price" => 25,
// 		"image" => "./images/programmer.jpg"
// 	],
// 	[
// 		"id" => 3,
// 		"name" => "Les sites Web pour les Nuls",
// 		"price" => 12,
// 		'image' => "./images/site-web.jpg"
// 	]
// ];


// // $bdd = new PDO('mysql:host= localhost;dbname=boutique', 'virginie.villard','OEvirg86!');
// // $reponse = $bdd -> query('SELECT * FROM `article` WHERE 1');

// // while ($donnees = $reponse -> fetch()) {
// // 	echo '<p>'.$donnees['article.Name'].' - '.$donnees['article.Name'].'</p>';
// // }


?>


<?php


function getArticlesBdd() {
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'virginie.villard','OEvirg86!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
    // On récupère tout le contenu de la table article de notre boutique
    $reponse = $bdd->query('SELECT * FROM article');
}

// connection BDD :
// $bdd = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'virginie.villard','OEvirg86!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Importation BDD :
// $article = $bdd->query('SELECT * FROM article');
// Parcours tableau et comparer chaque élément jusqu'à trouver tous les bons :
// while ($donnees = $article->fetch()){
// 	if (id == $donnees['ID']){
// 		echo $donnees['nom']
// 	}
// }


?>

