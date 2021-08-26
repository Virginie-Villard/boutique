<?php

// // Initie le panier
// function createPanier(){
//     if(!isset($_SESSION['panier'])) {
//         $_SESSION['panier'] = [];
//     }
// }

// // Permet dans le catalogue de rajouter des articles dans le panier
// function addToPanier($id, $quantite){
//     // Si mon id a déjà une quantité attribuée alors je rajoute la nouvelle quantité
//     if(isset($_SESSION['panier'][$id])) {
//         $_SESSION['panier'][$id] += $quantite;
    
//     }
//     else {
//         $_SESSION['panier'][$id] = intval($quantite);
//     }
// }

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
function computePanierTotal( $panier) {
    $total = 0;



    foreach($panier as $id => $quantite) {
       
        $article = getArticle($id);
       // var_dump($article);
       
        $total += intval($article['Price']) * intval($quantite);
    }
    echo $total;
}

function affichePanier($id, $quantite) {  
 

echo $id;
    $article = getArticle($id);
    $total = intval($article['Price']) * intval($quantite);
  
    afficheArticle($article);
  
    echo '<p>'.$article['Price'].'€ * '.$quantite.' = '.$total.' € </p>';
}  

?>









