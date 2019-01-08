<?php
include ('BaseCrawler.php');
class VnExpress extends BaseCrawler 
{
    public $__search1 = '/class="title.{1,15}detail/';
    public $__search2 = '/(style="text-align:right;"|class="author_mail"|align="right")/';//|class="Normal"
    public $__search3 = '/>/';
    // public $__search4 = '<article class="content_detail fck_detail width_common block_ads_connect">';
    
    private function __deleteGarbage() {
        $b = parent::takeCodeWebsite();
        // xóa đoạn code bên trên tiêu đề
        $b = parent::deleteBefore($this->__search1, $b);
        $b = parent::deleteAfter($this->__search2, $b);
        // echo $b;
        return $b;
    }

    public function takeTitle()
    {
        $f = parent::deleteBefore($this->__search3, $this->__deleteGarbage());
        return strip_tags($f);
        // echo $f;
    }
    public function takeContent()
    {   
        // $g = explode($this->__search4,$this->__deleteGarbage());
        // // bỏ phần chú thíc giữa nội dung và tiêu đề
        // unset($g[0]);
        // $gString = implode(' ',$g);
        // return strip_tags($gString);
        // // $g = $this->__deleteGarbage();
        // // $f = parent::deleteBefore($this->__search3, $this->__deleteGarbage());
        // // $g = str_replace( $f ,' ', $this->__deleteGarbage());
        // // return strip_tags($g);
        $g = str_replace($this->takeTitle(), ' ', $this->__deleteGarbage());
        // var_dump(htmlentities($g));
        $g = explode('>',$g,2);
        // print_r($y[1]);
        // var_dump($y);
        // // // var_dump($g[0]);
        // $z = $y[0].'>';
        // var_dump($z);
        // $count = 1;
        // $g = str_replace($z,' ', $g);
        // // echo $g;
        // echo $g[1];
        // // // $g = implode('',$g);
        return strip_tags($g[1]);
    }
}
?>