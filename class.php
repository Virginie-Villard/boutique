<!-- 
php standard recommendations
https://www.php-fig.org/psr/
Le nom de la classe, DateTime, est écrit en PascalCase, qui équivaut au UpperCamelCase. 
C’est une bonne pratique qui fait partie des PSR (PHP Standards Recommendations), en particulier PSR-1 et PSR-12. 
Les propriétés et les méthodes doivent être écrites au format camelCase.


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

// Je déclare une class Article
class Article {
    // // Je lui donne des propriétés typées
    // public int $ID = 0;
    // public string $Nom = "";
    // public string $Description = "";
    // public int $Prix = 0;
    // public string $Image = "";
    // public int $Poids = 0;
    // public int $Stock  = 0;
    // public bool $Disponible = false;
    // public bool $EnVente = false;
    // public int $Categorie = 0;

    public function __construct(int $ID, string $Nom, string $Description, int $Prix, string $Image, int $Poids, int $Stock, bool $Disponible, bool $EnVente, int $Categorie) {
        $this->ID = $ID;
        $this->Nom = $Nom;
        $this->Description = $Description;
        $this->Prix = $Prix;
        $this->Image = $Image;
        $this->Poids = $Poids;
        $this->Stock = $Stock;
        $this->Disponible = $Disponible;
        $this->EnVente = $EnVente;
        $this->Categorie = $Categorie;
    }

    // Method qui permet l'affichage de mes articles
    public function displayArticle() {
        echo "ID : ".$this->ID;
        echo '<br>';
        echo "Nom :".$this->Nom;
        echo '<br>';
        echo "Description :".$this->Description;
        echo '<br>';
        echo "Prix : ".$this->Prix;
        echo '<br>';
        echo 'Image : <img src='.$this->Image.' width="150" />';
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

// ______________________________________________________________________________
class Catalogue {
    public array $articleList;

    public function displayCat() {
        $i = 0;
        $arrayLength = count($this->articleList);

        while($i < $arrayLength) {
            echo "ID : ".$this->articleList[$i]->ID.'<br>'; //articleList en tant que propriété et pas variable !!!
            echo "Nom : ".$this->articleList[$i]->Nom .'<br>';
            echo "Description : ".$this->articleList[$i]->Description .'<br>';
            echo "Prix : ".$this->articleList[$i]->Prix .'<br>';
            echo "Poids : ".$this->articleList[$i]->Poids .'<br>';
            echo "Stock : ".$this->articleList[$i]->Stock .'<br>';
            echo "Disponible : ".$this->articleList[$i]->Disponible .'<br>';
            echo "En vente : ".$this->articleList[$i]->EnVente .'<br>';
            echo "Categorie : ".$this->articleList[$i]->Categorie .'<br>'; 
            
            // On lui donne la variable article ET on lui donne aussi le nom de l'article
            echo '<a href="index.php?page=article&id='.$this->articleList[$i]->ID.'"> <img src='.$this->articleList[$i]->Image .' width="150" /> </a> <br>';
            echo '<form action="index.php?page=panier" method="POST" enctype="multipart/form-data">';
            echo '<input type="number" name="quantite" value="1" />';
            echo '<input type="hidden" name="ID" value="'.$this->articleList[$i]->ID.'"/>';
            echo '<input type="submit" value="Ajouter l\'article au panier"/>';
            echo '</form>';
            
            $i++;
        }
    }
}

// ______________________________________________________________________________
// ______________________________________________________________________________

class Client {
    public array $clientList;

    public function __construct(int $ID, string $Prenom, string $Nom, string $Adresse,  int $Postcode, string $City, string $eMail, string $Image) {
        $this->ID = $ID;
        $this->Prenom = $Prenom;
        $this->Nom = $Nom;
        $this->Adresse = $Adresse;
        $this->Postcode = $Postcode;
        $this->City = $City;
        $this->eMail = $eMail;
        $this->Image = $Image;
    }

    public function displayClient() {
        $i = 0;
        $arrayLength = count($this->clientList);

        while($i < $arrayLength) {
            echo "<p> ID : ".$this->clientList[$i]->ID.'<br>'; //clientList en tant que propriété et pas variable !!!
            echo "Prénom : ".$this->clientList[$i]->Prenom .'<br>';
            echo "Nom : ".$this->clientList[$i]->Nom .'<br>';
            echo "Adresse : ".$this->clientList[$i]->Adresse .'<br>';
            echo "Postcode : ".$this->clientList[$i]->Postcode .'<br>';
            echo "City : ".$this->clientList[$i]->City .'<br>';
            echo "e-mail : ".$this->clientList[$i]->eMail .'<br>';
                        
            // On lui donne la variable client ET on lui donne aussi le nom de l'client
            echo '<img src='.$this->clientList[$i]->Image .' width="300" /> <br> </p>';

            $i++;
        }
    }
}

// ______________________________________________________________________________
class CatalogueClient {
    public array $clientList;

    public function displayClient() {
        $i = 0;
        $arrayLength = count($this->clientList);

        while($i < $arrayLength) {
            echo "ID : ".$this->clientList[$i]->ID.'<br>'; //clientList en tant que propriété et pas variable !!!
            echo "Prénom : ".$this->clientList[$i]->Prenom .'<br>';
            echo "Nom : ".$this->clientList[$i]->Nom .'<br>';
            echo "Adresse : ".$this->clientList[$i]->Adresse .'<br>';
            echo "Code postal : ".$this->clientList[$i]->Postcode .'<br>';
            echo "Ville : ".$this->clientList[$i]->City .'<br>';
            echo "e-mail : ".$this->clientList[$i]->eMail .'<br>';
            
            // On lui donne la variable client ET on lui donne aussi le nom du client
            echo '<img src='.$this->clientList[$i]->Image .' width="150" /> <br>';
                        
            $i++;
        }
    }
}

// ______________________________________________________________________________
// ______________________________________________________________________________

class Panier{
    public array $panierList;

    public function addPanier($id,$quantite) {
        $this->panierList[]=['id'=>$id, 'quantite'=>$quantite];
    }
}

?>