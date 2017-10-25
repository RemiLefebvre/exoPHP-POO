<?php


/*
** Detail of vehicul
*/
if (isset($_POST['detailVehicule'])) {
  include("controllers/detail/detail.php");
}



/*
** Listing of all vehicule
*/
else {
  include("controllers/listing/listing.php");
}
 ?>
