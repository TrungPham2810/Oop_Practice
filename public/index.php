<?php
    include('../application/action/__autoload.php');
    include_once('../application/action/Function.php');
    include_once('../application/config/config.php');
    // include_once('../application/class/Db.php');
    // include_once('../application/class/BaseCrawler.php');
    // require_once('../application/class/VietnamNet.php');
    // require_once('../application/class/VnExpress.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time()?>">
</head>
<body>
<table class="link" border="1" style="border-collapse:collapse; width:900px;margin:auto">
    <tr>
         <td style=" text-align:center; font-weight:bold; font-size:20px; color: blue;">Link Demo</td>
    </tr>
    <tr>
         <td>https://vietnamnet.vn/vn/thoi-su/chinh-tri/giam-doc-so-gtvt-tp-hcm-duoc-bo-nhiem-lam-truong-ban-quan-ly-duong-sat-do-thi-499478.html</td>
    </tr>
    <tr>
         <td>https://vietnamnet.vn/vn/thoi-su/ha-noi-doi-xay-nha-cao-tang-vuot-quy-dinh-tren-dat-vang-sat-ho-guom-499607.html</td>
    </tr>
    <tr>
         <td>https://vietnamnet.vn/vn/giai-tri/nhac/huong-tram-doi-dau-voi-erik-justatee-tai-zing-music-awards-499456.html</td>
    </tr>
    <tr>
         <td>https://vnexpress.net/thoi-su/ong-bui-xuan-cuong-quay-lai-lam-truong-ban-quan-ly-duong-sat-do-thi-tp-hcm-3863288.html</td>
    </tr>
    <tr>
         <td>https://vnexpress.net/kinh-doanh/chung-khoan-my-lao-doc-vi-apple-3863326.html</td>
    </tr>
    <tr>
         <td>https://vnexpress.net/the-gioi/my-canh-bao-cong-dan-than-trong-khi-toi-trung-quoc-3863310.html</td>
    </tr>
</table>

<form action="" method="post" style="margin-top:20px;text-align:center;" >
    <input type="text" style={background:red} name='link' placeholder='Put Url here' >
    <input type="submit" name='submit' value='Add data'>
    <?php
        if(!isset($_POST['submit'])) {
            echo "<span>Lưu ý url phải là 1 bài báo ở 2 trang vnexpress.net và vietnamnet.vn </span>";
        }
    ?>
</form>
<?php

 if (isset($_POST['submit'])){
     $a = $_POST['link'];
     $b = strpos($a, 'https://vnexpress.net/');
    if ($b === false) {
        $b = strpos($a, 'https://vietnamnet.vn/');
        if ($b === false) {
            echo ERROR;
            die();        
        } else {
            $xx = new Db();
            echo $xx->insert('data_vietnamnet', $a, 'VietnamNet');
            // echo insert_data('data_vietnamnet', 'VietnamNet');
            }
     } else {
        $xx = new Db();
        echo $xx->insert('data_vnexpress', $a, 'VnExpress');
        // echo insert_data('data_vnexpress', 'VnExpress');
            }
    } ;
    show_data('data_vietnamnet', 'Data VietnamNet');
    show_data('data_vnexpress', 'Data VnExpress');
?>
</body>
</html>
