<!-- Method GET permet de faire transiter les info dans l'url alors que POST
permet de ne pas apparaitre dans la barre d'adresse et peut envoyer des 
contenus plus gros ! 

Permet de rajouter un article au catalogue
(pour l'instant ça n'est pas persistant !)

-->

<form action="displayArticle.php" method="POST" enctype="multipart/form-data">

    <p><label> Titre du livre : <input  name="bookName" placeholder="Toto pour les nulls" /></label></p>

    <p><label> Prix du livre : <input  min="10" name="bookPrice" placeholder="25" /></label> € </p>

    <!--<p><label> Disponible immédiatement ? <input type="checkbox" name="dispo" /></label></p>-->

    <p><label> Photo de la couverture du livre : <input required type="file" accept="img.jpeg, img.png" name="bookImage" /></label></p>

    <p><input type="submit"/></p>

</form>


     
    
    



