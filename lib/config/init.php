<?php
//config
require_once 'config.php';

//autoloading
function __spl_autoload_register($class_name){
    require_once 'lib/'.$class_name. '.php';

}


?>