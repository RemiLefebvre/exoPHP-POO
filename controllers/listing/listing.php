<?php
require("controllers/phpmyadmin.php");
require("class/manager.php");
require("class/vehicules.php");

/*
**Creat Véhicule manager
*/
$manager = new VehiculeManager($db);

/*
**Add vehicule
*/
if (isset($_POST['add'])) {
  if (!empty($_POST['name']) && !empty($_POST['model']) && !empty($_POST['detail']) && !empty($_POST['type'])) {
    if (preg_match("#^[0-9]{4}$#",$_POST['model'])) {
      $name=htmlspecialchars($_POST['name']);
      $detail=htmlspecialchars($_POST['detail']);
      $type=htmlspecialchars($_POST['type']);
      $model=intval(htmlspecialchars($_POST['model']));
      if ($type=='truck') {
        $addVehicule = new Truck(["name" => $name,"model" => $model,"detail" => $detail]);
      }
      if ($type=='car') {
        $addVehicule = new Car(["name" => $name,"model" => $model,"detail" => $detail]);
      }
      if ($type=='moto') {
        $addVehicule = new Moto(["name" => $name,"model" => $model,"detail" => $detail]);
      }
      $manager->add($addVehicule);
    }
    else {
      $message="Date false (Exemple:1999)";
    }
  }
  else {
    $message="Champ empty";
  }
}


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
