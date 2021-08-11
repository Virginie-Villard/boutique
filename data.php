<?php

//Ma base se données (Mon catalogue d'articles)

$books = [
	[
		"id" => 1,
		"name" => "PHP pour les Nuls",
		"price" => 20,
		"image" => "./images/php.jpg"
	],
	[
		"id" => 2,
		"name" => "Programmer pour les Nuls",
		"price" => 25,
		"image" => "./images/programmer.jpg"
	],
	[
		"id" => 3,
		"name" => "Les sites Web pour les Nuls",
		"price" => 12,
		'image' => "./images/site-web.jpg"
	]
];


// $bdd = new PDO('mysql:host= localhost;dbname=boutique', 'virginie.villard','OEvirg86!');
// $reponse = $bdd -> query('SELECT * FROM `article` WHERE 1');

// while ($donnees = $reponse -> fetch()) {
// 	echo '<p>'.$donnees['article.Name'].' - '.$donnees['article.Name'].'</p>';
// }


?>