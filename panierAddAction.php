<?php
session_start();

require('panierFunctions.php');

createPanier();

if(isset($_POST['id']) 
&& isset($_POST['quantite']) 
&& $_POST['quantite'] > 0) {
	addToPanier($_POST['id'], $_POST['quantite']);
}

header('location:index.php?page=panier');
//var_dump($_SESSION['panier']);

?>









