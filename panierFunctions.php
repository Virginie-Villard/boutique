<?php

// Initie le panier
function createPanier(){
    if(!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }
}

// Permet dans le catalogue de rajouter des articles dans le panier
function addToPanier($id, $quantite){
    // Si mon id a déjà une quantité attribuée alors je rajoute la nouvelle quantité
    if(isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id] += $quantite;
    }
    else {
        $_SESSION['panier'][$id] = intval($quantite);
    }
}

// TODO (formulaire dans le panier + vérif que la quantité finale par article >= 0)
function removeFromPanier($id, $quantite){
    // Si mon id a déjà une quantité attribuée alors je rajoute la nouvelle quantité
    if(isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id] -= $quantite;
    }
    else {
        $_SESSION['panier'][$id] = intval($quantite);
    }
}

// Pour vider le panier sans écraser toute la session avec un bouton
function clearPanier(){
    unset($_SESSION['panier']);
}

// Faire le total du prix de tous les articles du panier avec la quantite
function computePanierTotal($books, $panier) {
    $total = 0;
    foreach($panier as $id => $quantite) {
        $article = getArticle($books, $id);
        $total += intval($article['price']) * intval($quantite);
    }
    echo $total;
}

function affichePanier($id, $quantite) {  
    //TODO !!! (fonction getArticlesBdd page data.php)
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



    $article = getArticleBdd($articles, $id);
    $total = intval($article['price']) * intval($quantite);
  
    afficheArticle($article);
  
    echo '<p>'.$article['price'].'€ * '.$quantite.' = '.$total.' € </p>';
}  

?>









