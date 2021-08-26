<?php

require('panierFunctions.php');

// Initie le panier
// Si la session panier n'existe pas, alors on crée un objet panier à partir de la class Panier.
//if(!isset($_SESSION['panier'])) $_SESSION['panier']= new Panier;
if(!isset($_SESSION['panier'])) {
	$_SESSION['panier'] = new Panier;
}

// Si l'ID reçu par le formulaire existe, alors on ajoute l'ID et la quantité de l'article du formulaire dans la session panier.
if (isset($_POST['ID'])) {
	$_SESSION['panier']->addPanier($_POST['ID'],$_POST['quantite']);
}
else{
    echo 'Votre panier est vide, visitez notre Catalogue !';
}

if(isset($_SESSION['panier'])) {
    foreach($_SESSION['panier']->panierList as $element){
        // echo $element['id'];
        // echo $element['quantite'];
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'virginie.villard','OEvirg86!', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
    // On récupère tout le contenu de la table article de notre boutique
    $reponse = $bdd->query('SELECT * FROM article WHERE IDArticle='.$element['id']);
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch()) {
        echo "ID : ".$donnees['IDArticle']."<br />";
        echo "Nom : ".$donnees['name']."<br />";
        echo "Description : ".$donnees['description']."<br />";
        echo "Prix : ".$donnees['Price']."<br />";
        echo "Poids : ".$donnees['Poids']."<br />";
        echo "Stock : ".$donnees['StockMagasin']."<br />";
        echo "Disponible : ".$donnees['disponible']."<br />";
        echo "En vente : ".$donnees['enVente']."<br />";
        echo "Catégorie : ".$donnees['Categorie']."<br />";
        echo "<img src='".$donnees['Image']."'width='150'/> <br />";
        // echo $donnees['quantite'];
        echo $element['id']."<br /><br />";
        echo $element['quantite']."<br />";
        }
    }
}

?>