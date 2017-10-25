<?php
require("model/manager.php");
require("model/entities/vehicules.php");
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
