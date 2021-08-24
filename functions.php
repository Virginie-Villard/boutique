<?php

// Recherche un article dans une collection donnée ($articles) par son id ($id)
// Si article n'existe pas renvoie null
function getArticle($id) {
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
    $reponse = $bdd->query('SELECT * FROM article WHERE IDArticle ='.$id);
    // On affiche chaque entrée une à une
    $donnees = $reponse->fetch();
   
		
			return $donnees;
			
	
}

// Affiche un article passé en paramètre
function afficheArticle($article) {
	echo $article['name'];
	echo'<br>';
	echo $article['Price'].' €';
	echo '<br>';
	echo '<img src="' . $article['Image'] . '" width="10%"/><br>';
	echo '<br>';
}

// Parcours d'une collection d'article, et affichage du catalogue
function afficheCatalogue($articles) {
	foreach($articles as $article) {
		echo '<p>'.$article['name'].'</p>';
		echo '<p>'.$article['price'].' €</p>';
		echo '<a href="index.php?page=article&id='.$article["id"].'">'; // On lui donne la variable article ET on lui donne aussi le nom de l'article
		echo '<img src="'.$article["image"].'" width="10%" /> <br>';
		echo '</a>';

		echo '<form action="panierAddAction.php" method="POST" enctype="multipart/form-data">';
		echo '<input type="number" value="1" name="quantite"/>';
		echo '<input type="hidden" name="id" value="'.$article['id'].'"/>';
		echo '<input type="submit" value="Ajouter l\'article au panier"/>';
		echo '</form>';
	}
}

?>


