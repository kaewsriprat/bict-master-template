<?php 
require("hostconfig.php");

spl_autoload_register(function ($class_name) {
    include(ROOT."/classes/".$class_name."/".$class_name.".php");
});

?>