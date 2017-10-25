<?php

// autoLoader
function loadclass($class){
  require("entities/".$class.".php");
}
spl_autoload_register("loadclass");
 ?>
