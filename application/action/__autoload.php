<?php 
spl_autoload_register(function($className) {
	include('../application/class/'.$className.'.php');
});
// include ('../class/Db.php');
// // var_dump(class_exists('Db'));
// include('../class/VietnamNet.php');
// include('../class/VnExpress.php');
// var_dump(class_exists('VietnamNet'));
 ?>