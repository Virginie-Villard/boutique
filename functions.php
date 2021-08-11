<?php

// Recherche un article dans une collection donnée ($articles) par son id ($id)
// Si article n'existe pas renvoie null
function getArticle($articles, $id) {
	foreach ($articles as $article) {
		if($id == $article['id']) {
			return $article;
		}
	}
return null;
}

// Affiche un article passé en paramètre
function afficheArticle($article) {
	echo $article['name'];
	echo'<br>';
	echo $article['price'].' €';
	echo '<br>';
	echo '<img src="' . $article['image'] . '" width="10%"/><br>';
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


