<?php require('class.php');
session_start();
if (isset($_GET['destroy'])){
  session_destroy(); 
}

//echo '<pre>';
//print_r($_GET); 
//echo '</pre>';

require('functions.php');

require('data.php');

include('header.php');

if(isset($_GET['page'])) {

  if($_GET['page'] == 'catalogue') {
    include('catalogue.php');
  }

  if($_GET['page'] == 'article') {
    include('article.php');
  }

  if($_GET['page'] == 'addArticle') {
    include('addArticle.php');
  }

  if($_GET['page'] == 'panier') {
    include('panierObject.php');
  }

  if($_GET['page'] == 'client') {
    include('client.php');
  }

}
else {
  include('accueil.php');
}

include("footer.php");

?>





