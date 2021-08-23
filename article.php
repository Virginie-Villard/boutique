<?php

//TODO possibilité de commander un article directement dans la page article. 

if(isset($_GET['id'])) {     
	// Je vais chercher l'article à afficher dans les données
	$article = getArticle(, $_GET['id']);

	//echo '<pre>';
	//print_r($article); 
	//echo '</pre>';

	if($article != null) {
	// Je passe l'article à la fonction d'affichage
	afficheArticle($article);
	}
	else {
	echo 'Cet article n\'existe pas';
	}
}
else {
	echo 'Il manque l\'id dans GET';
}

?>



