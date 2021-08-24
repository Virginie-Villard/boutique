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


function articlesBdd() {
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
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <p>
        <strong>Article : </strong> <?php echo $donnees['name']; ?><br />
        Description : <?php echo $donnees['description']; ?><br />
        Prix : <?php echo $donnees['Price']; ?>  €<br />
        <a href = "index.php?page=article&id=<?php echo $donnees['IDArticle']; ?>"><img src = <?php echo $donnees['Image']; ?> alt = image de <?php echo $donnees['name']?> width = "200"> </a> <br />
		<form action="panierAddAction.php" method="POST" enctype="multipart/form-data">
		<input type="number" value="1" name="quantite"/>
		<input type="hidden" name="id" value="<?php echo $donnees['IDArticle']; ?>"/>
		<input type="submit" value="Ajouter l\'article au panier"/>
		</form>
        
    <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
}


require('class.php');

$article1 = new Article;
    $article1->ID = 1;
    $article1->Nom = "PHP pour les nulls";
    $article1->Description = "Apprenez le PHP facilement !";
    $article1->Prix = 20;
    $article1->Image = "https://images-na.ssl-images-amazon.com/images/I/41aL8HZndgL._SX340_BO1,204,203,200_.jpg";
    $article1->Poids = 1000;
    $article1->Stock = 108;
    $article1->Disponible = 1;
    $article1->EnVente = 1;
    $article1->Categorie = 1;
    $article1->displayArticle();


?>

