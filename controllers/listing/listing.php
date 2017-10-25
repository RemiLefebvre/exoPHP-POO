<?php
require("controllers/phpmyadmin.php");
require("class/manager.php");
require("class/vehicules.php");

/*
**Creat Véhicule manager
*/
$manager = new VehiculeManager($db);

/*
**Update vehicule
*/
if (isset($_POST['validModif']) && isset($_POST['type']) && isset($_POST['name']) && isset($_POST['model'])) {
  if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['model'])) {
    if (preg_match("#^[0-9]{4}$#",$_POST['model']) && preg_match("#^car|truck|moto$#",$_POST['type'])) {

      $modifVehiculeType=htmlspecialchars($_POST['type']);
      $modifVehiculeModel=htmlspecialchars($_POST['model']);
      $modifVehiculeName=htmlspecialchars($_POST['name']);
      $modifVehiculeId=htmlspecialchars($_POST['id']);

      if ($modifVehiculeType=="truck") {
        $modifVehicule = new Truck(["id" => $modifVehiculeId,"name" => $modifVehiculeName,"model" => $modifVehiculeModel,"detail" => $modifVehiculeModel]);
      }
      elseif ($modifVehiculeType=="car") {
        $modifVehicule = new Car(["id" => $modifVehiculeId,"name" => $modifVehiculeName,"model" => $modifVehiculeModel,"detail" => $modifVehiculeModel]);
      }
      elseif ($modifVehiculeType=="moto") {
        $modifVehicule = new Moto(["id" => $modifVehiculeId,"name" => $modifVehiculeName,"model" => $modifVehiculeModel,"detail" => $modifVehiculeModel]);
      }
      $manager->update($modifVehicule);
    }
    else {
      $message="Model or type false ,exemple-> model:1999 and type:car (in lower case)";
    }
  }
  else {
    $message="Champ empty";
  }
}


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
**Delete vehicule
*/
if (isset($_POST['supp']) && isset($_POST['id'])) {
  $suppVehicule=intval(htmlspecialchars($_POST['id']));
  $manager->delete($suppVehicule);
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
