<?php


/*
** Detail of vehicul
*/
if (isset($_GET['id'])) {
  include("controllers/detail/detail.php");
}

/*
** Listing of all vehicule + filtre
*/
// elseif (condition) {
//   # code...
// }


/*
** Listing of all vehicule
*/
else {
  include("controllers/listing/listing.php");
}
 ?>
