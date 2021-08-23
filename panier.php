<?php

require('panierFunctions.php');

if(isset($_SESSION['panier'])) {
    echo '<p><a href= "panierClearAction.php">Vider le panier</a></p>';
}

//var_dump($_SESSION['panier']);

if(isset($_SESSION['panier'])) {
    foreach($_SESSION['panier'] as $id => $quantite) {
        affichePanier($books, $id, $quantite);
    }
}
else{
    echo 'Votre panier est vide, parcourez notre catalogue';
}

echo '<p>Votre Panier a un montant total de : ';
computePanierTotal($_SESSION['panier']);
echo ' €</p>';

/* TODO pouvoir modifier la quantité d'un article dans le panier.
function modifQuantite($articles) {
	foreach($articles as $article) {
		// echo '<p>'.$article['name'].'</p>';
		// echo '<p>'.$article['price'].' €</p>';
		// echo '<a href="index.php?page=article&id='.$article["id"].'">'; // On lui donne la variable article ET on lui donne aussi le nom de l'article
		// echo '<img src="'.$article["image"].'" width="10%" /> <br>';
		// echo '</a>';

		echo '<form action="panierModifAction.php" method="POST" enctype="multipart/form-data">';
		echo '<input type="number" value="1" name="quantite"/>';
		echo '<input type="hidden" name="id" value="'.$article['id'].'"/>';
		echo '<input type="submit" value="Ajouter l\'article au panier"/>';
		echo '</form>';
	}
}
*/
?>





