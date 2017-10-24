<?php
require("controllers/phpmyadmin.php");

$manager = new VehiculesManager($db);



require("view/listingView.php");

 ?>
