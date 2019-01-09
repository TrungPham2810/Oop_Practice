<?php session_start();
// include ('__autoload.php');
include ('../class/Db.php');
include ('../config/config.php');
if (isset($_GET)) {
    $table = $_GET['table'];
    $id = $_GET['id'];
    $a = new Db();
    $a -> remove($table, "Id = $id");
    $_SESSION['delete']= '<span class="flash text_color">Delete Success</span>';
    header('location:../../public/index.php');
}
?> 
