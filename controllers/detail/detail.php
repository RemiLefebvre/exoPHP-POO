<?php
require("model/manager.php");
require("model/entities/vehicules.php");
require("services/createVehicule.php");




/*
**Creat Véhicule manager
*/
$manager = new VehiculeManager($db);


/*
**Get vehicule
*/
if (isset($_POST['id'])) {
  /*protected XSS failling*/
  $vehiculeId = intval(htmlspecialchars($_POST['id']));

  /*get the vehicule's infos */
  $vehicule = $manager->get($vehiculeId);
}



require("view/detailView.php");

 ?>
