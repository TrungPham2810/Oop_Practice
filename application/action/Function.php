<?php
    // function insert_data($tableName, $className) 
    // {   
    //     global $a;
    //     $c = new $className();
    //     $c -> url = $a;
    //     // gán giá trị cho các biến title và content
    //     $title = $c -> takeTitle();
    //     $content = $c -> takeContent();
    //     // kiểm tra xem dữ liệu này đã được lưu chưa
    //     $sql1 = "SELECT Id FROM $tableName WHERE Title = '$title' ";
    //     $test = new Db();
    //     if ($test -> getRow($sql1) == false) {
    //         $data = array(
    //             'Title'   => $title,
    //             'Content' => $content,
    //         );
    //         $d = new Db();
    //         $d -> insert($tableName, $data);
    //         return '<span>Success</span>';
    //     } else {
    //         return '<span>Dữ liệu đã tồn tại, mời bạn nhập dữ liệu mới</span>';
    //     }         
    // };

    function show_data($tableName, $tableTitle)
    {
        echo  "<table class=\"show_data\" border='1' style=\"border-collapse:collapse\">
        <tr style=\"text-align:center;font-size:25px;font-weight:bold;\">
            <td colspan='4'>".$tableTitle." </td>
        </tr>
        <tr style=\"text-align:center;\">
            <td >ID</td>
            <td >Title</td>
            <td>Content</td>
            <td>Delete</td>
        </tr>";
        $e = new Db();
         $sql1 = "SELECT * FROM $tableName";
         $x=$e->getList($sql1);
         foreach($e->getList($sql1) as $key=>$value)
         {
             echo '<tr>';
             echo "<td>".$value['Id']."</td>";
             echo "<td>".$value['Title']."</td>";
             echo "<td><a href=\"../application/action/ShowContent.php?table=".$tableName."&id=".$value['Id']."\">Show Content</a></td>";
             echo "<td><a href=\"../application/action/DeleteNews.php?table=".$tableName."&id=".$value['Id']."\">Delete</a></td></tr>";
         }
        echo '</table>';
    };
?>