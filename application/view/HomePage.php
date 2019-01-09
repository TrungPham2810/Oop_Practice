
    <table class="link" border="1" >
    <tr>
         <td class="title_table_link">Link Demo</td>
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

<form action="" method="post" class="input_form"  >
    <input type="text"  name='link' value="<?php if (isset($_SESSION['linkerror'])) {
         echo trim($_SESSION['linkerror']);
        unset($_SESSION['linkerror']);
    }?>" placeholder='Put url here' >
    <input type="submit" name='submit' value='Add data'>
    <?php
        if(!isset($_POST['submit'])) {
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            } elseif (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            } elseif (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            } elseif (isset($_SESSION['existed'])) {
                echo $_SESSION['existed'];
                unset($_SESSION['existed']);
            } else {
                echo NOTICE;
            }
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
            $_SESSION['linkerror']= $_POST['link'];
            $_SESSION['error']= ERROR;
            // echo ERROR;
            // die();        
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
            header('location:index.php');
    } ;
    // header('location:../application/view/HomePage.php');
    show_data('data_vietnamnet', 'Data VietnamNet');
    show_data('data_vnexpress', 'Data VnExpress');
?>