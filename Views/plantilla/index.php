<?php 






define ('DS',DIRECTORY_SEPARATOR);
define ('ROOT',realpath(dirname(__FILE__)).DS);
define ('APP_CONFIG',ROOT.'config'.DS);

require_once APP_CONFIG.'config.php';
require_once APP_CONFIG.'Database.php';


if(isset($_GET['ruta'])){
echo $_GET['ruta'];
}
?>