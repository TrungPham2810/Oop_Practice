<?php
class BaseCrawler
{
    protected function takeCodeWebsite()
    {   
        $ch = curl_init();
        // Config  for CURL
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Run CURL
        $result =curl_exec($ch);
        // Stop CURL, release
        curl_close($ch);
        // return code
        return $result;
    }

    protected function deleteAfter($search, $content)
        {
            $result = preg_split($search, $content);
            if (isset($result[0])) {
                return $result[0];
            } else {
                echo ERROR;
                die();
            }
        }

    protected function deleteBefore($search, $content)
    {
        $result = preg_split($search, $content);
        if (isset($result[1])) {
            return $result[1];
        } else {
            echo ERROR;
            die();
        }
        
    }
}

// $a = new BaseCrawler();
// $a ->url = "https://vnexpress.net/tam-su/trong-con-say-toi-da-di-qua-gioi-han-voi-hai-nguoi-dan-ong-3863180.html";
// $b = $a->takeCodeWebsite();
// // xóa đoạn code bên trên tiêu đề
// $b = $a->deleteBefore('class="title_news_detail mb10">', $b);
// // xóa đoạn code bên dưới nội dung
// $b = $a->deleteAfter('style="text-align:right;"', $b);
// var_dump($b);
?>
