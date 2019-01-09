<?php
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
         foreach($e->getList($sql1) as $key=>$value)
         {
             echo '<tr>';
             echo "<td>".$value['Id']."</td>";
             echo "<td>".$value['Title']."</td>";
             echo "<td><a href=\"index.php?table=".$tableName."&id=".$value['Id']."\">Show Content</a></td>";
             echo "<td><a href=\"../application/action/DeleteNews.php?table=".$tableName."&id=".$value['Id']."\">Delete</a></td></tr>";
         }
        echo '</table>';
    };
?>