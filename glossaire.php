class = Une "famille" d'objets non définis. Par exemple un pont, un sac à dos, un client, un article,...
elle comporte le mot clé class, le nom de la classe, puis accolades contenant la définition des propriétés et des méthodes appartenant à la classe.
elle est souvent écrite en UpperCamelCase.
class ClassName{
    propriétés :
}

public / protected / private function = la visibilité d'une fonction
Les éléments déclarés comme publics sont accessibles partout. L'accès aux éléments protégés est limité à la classe elle-même, ainsi qu'aux classes qui en héritent et parente. L'accès aux éléments privés est uniquement réservé à la classe qui les a définis.

echo (on ne peut pas afficher un tableau), on fait donc un :
var_dump 

https://www.learn-php.org/en/Objects exercice :
<?php
class Car {
    public function __construct($brand, $year) {
        $this->brand = $brand;
        $this->year = $year;
    }

    public function print_details() {
        echo "This car is a " . $this->year . " " . $this->brand . ".\n";
    }
}

$car = new Car("Toyota", 2006);
$car->print_details();
?>
Résultat : This car is a 2006 Toyota.


un objet = 
(cf : https://www.php.net/manual/fr/language.oop5.basic.php)

instanciation = 
$instance = new SimpleClass();

property =
method =

http://www.conseil-webmaster.com/formation/php-poo/01-classes-objets-php.php (attributs / method / objet / class)
______________________________________________________________________________________


attributs = Les attributs sont les caractères propres à un objet. (= une variable)
chacune des fonctions de la class aura accès aux variables de cette entité. 
    Exemple : Une personne, par exemple, possèdent différents attributs qui lui sont propres comme le nom, le prénom, la couleur des yeux, le sexe, la couleur des cheveux, la taille...
On définit les attributs dans la classe.
Quand on crée un nouvel objet à partir de cette classe, on leur donnera une valeur.


classe = Une classe est une entité regroupant des variables et des fonctions. Chacune de ces fonctions aura accès aux variables de cette entité. (Une classe n'est pas un objet.)
    Exemple : les classes contiennent la définition des objets que l'on va créer par la suite. Les gâteaux et leur moule. Le moule est unique. Il peut produire une quantité infinie de gâteaux. Dans ce cas-là, les gâteaux sont les objets et le moule est la classe : le moule va définir la forme du gâteau. La classe contient donc le plan de fabrication d'un objet et on peut s'en servir autant qu'on veut afin d'obtenir une infinité d'objets.



méthode = Une méthode est une fonction qu'on applique à une classe.  Il s'agit en fait de fonctions qui peuvent prendre ou non des paramètres et retourner ou non des valeurs / objets. (Si c'est une action on utilise le verbe à l'infinitif)
    Exemple : Un objet personne dispose des actions suivantes : manger, dormir, boire, marcher, courir...


getter = Un attribut private, n’est accessible ni en lecture, ni en écriture.
Nous allons donc utiliser des getters, des méthodes qui nous permettent d’accéder aux données de ces attributs.
L’intérêt est d’avoir plus de possibilités, pour formater les données ou pour traduire ce qui vient de la base de données, etc.
Il transforme donc la donnée pour lui permettre de s’afficher.
Par exemple, on peut modifier la casse d’un attribut lors de son affichage :
<?php  
    class Table {
        public function getNameUppercase() {
            return strtoupper($this->nom);
        }
    }

    $maTable = new Table();
    echo "TABLE : " . $maTable->getNameUppercase();
?>
// Le nom de la nouvelle table sera écrit en majuscule


setter = Ce sont des méthodes servent à : changer la valeur d’un des attributs de notre classe. Le setter prépare donc la donnée et à vérifier le type aussi (on peut valider les données avant de réellement les donner à nos objets.).
En fait, quand on met un attribut sur private, on n’y a plus accès depuis l’extérieur de la classe. Par contre, il reste accessible à l’intérieur de la classe ! Un setter permet alors de retourner l’objet lui-même avec return $this ; .
<?php
    class Table {
        private $nom;
        private $plateau = "plastique";
        private $pieds = 'plastique';

        public function setName($nom) {
            $this->nom = $nom;
        }
    }
?>


instancier =  Instancier une classe, c'est se servir d'une classe afin qu'elle nous crée un objet. En gros, une instance est un objet. Une instance est une représentation particulière d'une classe.
Lorsque l'on crée un objet, on réalise ce que l'on appelle une « instance de la classe ». C'est à dire que du moule, on en extrait un nouvel objet qui dispose de ses attributs et de ses méthodes. L'objet ainsi créé aura pour type le nom de la classe. 
On utilise le mot-clé new suivant du nom de la classe.


héritage (innheritance) = Si une classe fille étend la classe mère, elle pourra donc disposer des attributs et des méthodes de celle-ci. Par exemple, lorsque une classe est étendu, la classe enfant hérite de toutes les méthodes publiques et protégées, propriétés et constantes de la classe parente. Tant qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine. L'héritage permet donc la mise en place de fonctionnalités supplémentaires dans les classes enfants, sans avoir à réimplémenter en leur sein toutes les fonctionnalités communes.
(Les méthodes privées d'une classe parente ne sont pas accessible à la classe enfant. Par conséquent, les classes enfant peuvent réimplémenter une méthode privé eux-même sans se soucier des règles d'héritage normale.)


surcharger (overriding) = La surcharge définit des fonctions qui ont des signatures similaires, mais qui ont des paramètres différents.