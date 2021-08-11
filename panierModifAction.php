<?php
session_start();
// TODO pouvoir modifier la quantité des articles dans le panier
// et vérifier qu'elle ne puiss pas être < 0.


header('location:index.php?page=panier');
//var_dump($_SESSION['panier']);

?>