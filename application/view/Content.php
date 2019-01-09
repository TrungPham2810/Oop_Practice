<div class="box">
        <?php
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
            <a href="index.php">
                <h1 style="display:inline;vertical-align:middle;">&lsaquo;</h1>
                Home Page
            </a>
        </div>
    </div>