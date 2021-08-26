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
