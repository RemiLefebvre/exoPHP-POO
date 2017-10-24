<?php
require("controllers/phpmyadmin.php");

/*
**Creat Véhicule manager
*/
$manager = new VehiculesManager($db);



/*
**Get Véhicule list
**If filtring
*/
if (isset($_POST['filtre'])) {
  $filtre=htmlspecialchars($_POST['filtre']);
}
else {
  $filtre='name';
}
$vehicules= $manager->getList($filtre);



require("view/listingView.php");

 ?>
