
<!--htmlspecialchars pour échaper les balises et éviter la faille XSS
sinon strip_tags pour les retirer-->

<?php

require('functions.php'); 

// Je déclare un array qui va pouvoir recevoir les valeurs qui vont entrer dans mon panier
$book = [
	'id' => 0,
	'name' => 'Untitled',
	'price' => 0,
	'image' => ''
];

// Je déclare un array vide qui pourra recevoir les erreurs s'il y en a.
$errors = [];

//Affichage du Titre du livre :
if(isset($_POST['bookName']) && is_string($_POST['bookName']) && strlen($_POST['bookName']) > 0) {
	$book['name'] = $_POST['bookName'];
}
else {
	$errors[] = 'Le titre du livre est invalide';
}

if (isset($_POST['bookPrice'])) {
	$price = intval($_POST['bookPrice']);

	if ($price > 0) {
		$book['price'] = $_POST['bookPrice'];
	}
	else {
		$errors[] = 'Le prix doit etre supérieur à zéro';
}
}
else {
	$errors[] = 'Le prix est manquant';
}


// Je déclare les extensions d'image que j'autorise
$allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];

//echo '<pre>';
//print_r($_FILES);
//echo '</pre>';
  
if(isset($_FILES['bookImage']) 
&& $_FILES['bookImage']['error'] == 0) {
  
	// Si la taille de l'image est inférieure à 1000000 octets.
	if($_FILES['bookImage']['size'] < 1000000) { 

		// On récupère des info sur le fichier à partir du nom de l'image
		$fileInfo = pathinfo($_FILES['bookImage']['name']); 

		//echo '<pre>'; // (garde la mise en forme)
		//print_r($fileInfo); // donne un visuel de l'array
		//echo '</pre>';

		// Extention du fichier uploadé convertie en minuscule !
		$fileExtension = strtolower($fileInfo['extension']); 

    if(in_array($fileExtension, $allowedExtensions)) { 

		$image = './images/'.$fileInfo['basename'];
		move_uploaded_file($_FILES['bookImage']['tmp_name'], $image);
		$book['image'] = $image;
    }
    else {
		$errors[] = 'L\'extention '.$fileExtension.' n\'est pas autorisée';
    }

	}
	else {
		$errors[] = 'Le fichier de l\'image est trop gros !';
	}
}
else {
	$errors[] = 'l\'image comporte une erreur';
}

// S'il n'y a pas d'erreurs dans mon array d'erreurs, on affiche l'article.
if (sizeof($errors) == 0) {
	afficheArticle($book);
}
// Sinon, on affiche les erreurs présentes.
else {
	echo 'Erreurs : <br>';
	foreach ($errors as $error) {
		echo $error.'<br>';
	}
}

?>







