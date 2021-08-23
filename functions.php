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
// function afficheArticle($article) {
// 	echo $article['name'];
// 	echo'<br>';
// 	echo $article['price'].' €';
// 	echo '<br>';
// 	echo '<img src="' . $article['image'] . '" width="10%"/><br>';
// 	echo '<br>';
// }



function afficheArticle($reponse) {
	getArticlesBdd();
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <p>
        <strong>Article : <?php echo $donnees['name']; ?> </strong> <br />
        Description : <?php echo $donnees['description']; ?><br />
        Prix : <?php echo $donnees['Price']; ?>  €<br />
        <img src = <?php echo $donnees['Image']; ?> alt = image de <?php echo $donnees['name']?> width = "200"> <br />

		<form action="panierAddAction.php" method="POST" enctype="multipart/form-data">
		<input type="number" value="1" name="quantite"/>
		<input type="hidden" name="id" value="'.$article['id'].'"/>
		<input type="submit" value="Ajouter l\'article au panier"/>
		</form>
        
    <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
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


