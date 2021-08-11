<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ma page test</title>
    <link rel="stylesheet" href="styles/style.css"/>
  </head>

  <body>

    <h1> Le developpement pour les n00b !</h1>
      
    <?php
        $livres = [
           [
            "name" => "PHP pour les Nuls",
            "prix" => "20 euros",
            "image" => "images/php.jpg"
           ],
        
           [
            "name" => "Programmer pour les Nuls",
            "prix" => "25 euros",
            "image" => "images/programmer.jpg",
          ], 
          [
            "name" => "Les sites Web pour les Nuls",
            "prix" => "20 euros",
            'image' => "images/site-web.jpg",
          ],
        ];

        foreach($livres as $element){
          echo $element['name'];
          echo'<br>';
          echo $element['prix'];
          echo '<br>';
          //echo $element['image'];
          //echo  "<img src='".$element['image']."'width='10%' /> <br>";
          echo '<a href="presentation-articles/article.php"> <img src="'.$element['image'].'" /> </a>';
          echo '<br>';
        }
       

    ?>

  </body>
</html>
