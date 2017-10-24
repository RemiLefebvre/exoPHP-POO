<?php
require("controllers/phpmyadmin.php");
require("class/manager.php");
require("class/vehicules.php");

/*
**Creat Véhicule manager
*/
$manager = new VehiculeManager($db);



/*
**Get Véhicule list
**If filtring
*/
// if (isset($_POST['filtre'])) {
//   $filtre=htmlspecialchars($_POST['filtre']);
// }
// else {
//   $filtre='name';
// }
// $vehicules= $manager->getList($filtre);

/*
**Add vehicule
*/
if (isset($_POST['add'])) {
  if (!empty($_POST['name']) && !empty($_POST['model']) && !empty($_POST['detail']) && !empty($_POST['type'])) {
    $name=htmlspecialchars($_POST['name']);
    $detail=htmlspecialchars($_POST['detail']);
    $type=htmlspecialchars($_POST['type']);
    $model=intval(htmlspecialchars($_POST['model']));
    if ($type=='truck') {
      $addVehicule = new Truck(["name" => $name,"model" => $model,"detail" => $detail]);
      echo "addT";
    }
    if ($type=='car') {
      $addVehicule = new Car(["name" => $name,"model" => $model,"detail" => $detail]);
      echo "addC";
    }
    if ($type=='moto') {
      $addVehicule = new Moto(["name" => $name,"model" => $model,"detail" => $detail]);
      echo "addM";
    }
    $addVehicule->name();
    $manager->add($addVehicule);
  }
}

require("view/listingView.php");

 ?>
