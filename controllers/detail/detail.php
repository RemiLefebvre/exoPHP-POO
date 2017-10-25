<?php
require("controllers/phpmyadmin.php");
require("class/manager.php");
require("class/vehicules.php");

/*
**Creat Véhicule manager
*/
$manager = new VehiculeManager($db);


/*
**Get vehicule
*/
if (isset($_POST['id'])) {
  $vehiculeId = intval(htmlspecialchars($_POST['id']));
  $vehicule = $manager->get($vehiculeId);
}



require("view/detailView.php");

 ?>
