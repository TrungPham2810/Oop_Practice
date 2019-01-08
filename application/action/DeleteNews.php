<?php 
// include ('__autoload.php');
include ('../class/Db.php');
include ('../config/config.php');
if (isset($_GET)) {
    $table = $_GET['table'];
    $id = $_GET['id'];
    $a = new Db();
    $a -> remove($table, "Id = $id");
    header('location:../../public/index.php');
}
?> 
