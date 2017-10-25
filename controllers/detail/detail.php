<?php
require("model/manager.php");
require("services/createVehicule.php");
require("services/autoLoader.php");




/*
**Creat Véhicule manager
*/
$manager = new VehiculeManager($db);




/*
**Update vehicule
*/
/*verification if there are all require's infos*/
if (isset($_POST['updateVehicule']) && isset($_POST['detail']) && isset($_POST['type']) && isset($_POST['model']) && isset($_POST['name'])) {

  /*verification if all input are full*/
  if ( !empty($_POST['detail']) && !empty($_POST['type']) && !empty($_POST['model']) && !empty($_POST['name'])) {

    $vehiculeId=htmlspecialchars($_POST['id']);
    $vehiculeModel=htmlspecialchars($_POST['model']);
    $vehiculeDetail=htmlspecialchars($_POST['detail']);
    $vehiculeType=htmlspecialchars($_POST['type']);
    $vehiculeName=htmlspecialchars($_POST['name']);

    $modifVehicule=createVehicule(["id" => $vehiculeId,"name" => $vehiculeName,"model" => $vehiculeModel,"type" => $vehiculeType,"detail" => $vehiculeDetail]);

    $manager->update($modifVehicule);
  }
}


/*
**Get vehicule
*/
if (isset($_POST['id'])) {
  /*protected XSS failling*/
  $vehiculeId = intval(htmlspecialchars($_POST['id']));

  /*get the vehicule's infos */
  $vehicule = $manager->get($vehiculeId);
}

/*
**View detail
*/
/*if modif select -> view with form*/
if (isset($_POST['modifDetail'])) {
  require("view/detailViewModif.php");
}
/*View detail without form*/
else {
  require("view/detailView.php");
}

 ?>
