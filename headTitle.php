<?php

// Pour que mon Title (onglet) puisse changer en fonction de la page et du nom de l'article quand on est dans la page d'article.

if(isset($_GET['page'])) {

  if($_GET['page'] == 'catalogue') {
    echo '<title>Catalogue</title>';
  }

  if($_GET['page'] == 'article' && isset($_GET['id'])) {

    $article = getArticle($_GET['id']);
    if($article != null) {
      echo '<title>'.$article['name'].'</title>';
    }
  }

  if($_GET['page'] == 'addArticle') {
    echo '<title>Ajouter un article</title>';
  }

  if($_GET['page'] == 'panier') {
    echo '<title>Panier</title>';
  }
}
else {
  echo '<title>Accueil</title>'; 
}

?>


 



