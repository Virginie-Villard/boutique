<!-- 
php standard recommendations
https://www.php-fig.org/psr/
Le nom de la classe, DateTime, est écrit en PascalCase, qui équivaut au UpperCamelCase. 
C’est une bonne pratique qui fait partie des PSR (PHP Standards Recommendations), en particulier PSR-1 et PSR-12. 
Les propriétés et les méthodes doivent être écrites au format camelCase.



class Article
Nom
description
Prix
Image
Poids
Stock 
Disponible (O/N)
...


function displayArticle();

classe Catalogue
tableau d’objets Article
Le constructeur de cette classe permettra le remplissage du catalogue à partir de la base de données.
On affichera le catalogue en utilisant une fonction displayCat() qui admet en paramètre un objet Catalogue, et qui permettra l’affichage du catalogue en Html.

Modifier ensuite le programme catalogue.php qui affiche une liste d’articles en utilisant cette classe Catalogue. 

Nous allons créer de la même manière une classe Client et une classe ListeClients, ainsi qu’un programme clients.php qui affichera la liste des clients.
 -->
<!-- <p>test</p> -->
 <?php

// declare(strict_types=1);

class Article {
    public int $ID = 0;
    public string $Nom = "";
    public string $Description = "";
    public int $Prix = 0;
    public string $Image = "";
    public int $Poids = 0;
    public int $Stock  = 0;
    public bool $Disponible = false;
    public bool $EnVente = false;
    public int $Categorie = 0;

    public function displayArticle() {
        echo "ID : ".$this->ID;
        echo '<br>';
        echo "Nom :".$this->Nom;
        echo '<br>';
        echo "Description :".$this->Description;
        echo '<br>';
        echo "Prix : ".$this->Prix;
        echo '<br>';
        echo "Image : ".$this->Image;
        echo '<br>';
        echo "Poids : ".$this->Poids;
        echo '<br>';
        echo "Stock : ".$this->Stock;
        echo '<br>';
        echo "Disponible : ".$this->Disponible;
        echo '<br>';
        echo "En vente : ".$this->EnVente;
        echo '<br>';
        echo "Catégorie : ".$this->Categorie;
        echo '<br>';
    }
}



?>