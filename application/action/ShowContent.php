<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <?php include('../class/Db.php');
        include ('../config/config.php');
            if (isset($_GET)) {
                $table = $_GET['table'];
                $id = $_GET['id'];
                $sql = "SELECT * FROM $table WHERE Id = $id";
                $a = new Db();
                $b = $a -> getRow($sql);
                // show data
                echo '<div class="news">';
                echo "<h1>".$b['Title']."</h1>";
                echo "<p style='text-indent: 20px;'>".$b['Content']."</p>";
                echo '</div>';
            }
        ?> 
        <div class="back" style="text-align:center">
            <a href="../../public/index.php">Quay lại trang chủ</a>
        </div>
    </div>
</body>
</html>
