<?php
session_start();

//config
require_once 'config.php';

//include helper file
require_once 'lib/helpers/system_helper.php';

//autoloading
function __spl_autoload_register($class_name){
    require_once 'lib/'.$class_name. '.php';

}


?>