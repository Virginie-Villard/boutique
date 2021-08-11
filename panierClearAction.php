<?php
session_start();

require('panierFunctions.php');

clearPanier();

header('location:index.php?page=catalogue');

?>









