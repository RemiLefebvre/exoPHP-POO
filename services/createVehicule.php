<?php

  function createVehicule(array $infos){

    if ($infos['type']=="truck") {
      $vehicule = new Truck($infos);
    }
    elseif ($infos['type']=="car") {
      $vehicule = new Car($infos);
    }
    elseif ($infos['type']=="moto") {
      $vehicule = new Moto($infos);
    }

    return $vehicule;
  }



 ?>
