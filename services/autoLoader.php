<?php

// autoLoader
function loadclass($class){
  require("../../model/entities/".$class.".php");
}
spl_autoload_register("loadclass");
 ?>
