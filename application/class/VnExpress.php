<?php
include ('BaseCrawler.php');
class VnExpress extends BaseCrawler 
{
    public $__search1 = '/class="title.{1,15}detail/';
    public $__search2 = '/(style="text-align:right;"|class="author_mail"|align="right")/';//|class="Normal"
    public $__search3 = '/>/';
    // public $__search4 = '<article class="content_detail fck_detail width_common block_ads_connect">';
    
    public function __deleteGarbage() {
        $b = parent::takeCodeWebsite();
        // xóa đoạn code bên trên tiêu đề
        $b = parent::deleteBefore($this->__search1, $b);
        $b = parent::deleteAfter($this->__search2, $b);
        // echo $b;
        // var_dump($b);
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
        $g = str_replace($this->takeTitle(), ' ', $this->__deleteGarbage());
        $g = explode('>',$g,2);
        return strip_tags($g[1]);
    }
}
?>