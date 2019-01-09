<?php
include ('BaseCrawler.php');
class VietnamNet extends BaseCrawler
{
    private $__search1 = '/class="title f-22 c-3e">/';
    private $__search2 = '/class="m-t-10 ArticleDateTime clearfix"/';
    private $__search3 = '/<\/h1>/';

    public function __deleteGarbage() {
        $b = parent::takeCodeWebsite();
        // xóa đoạn code bên trên tiêu đề
        $b = parent::deleteBefore($this->__search1, $b);
        $b = parent::deleteAfter($this->__search2, $b);
        return $b;
    }
    // take title
    public function takeTitle()
    {
        $f = parent::deleteAfter($this->__search3, $this->__deleteGarbage());
        return strip_tags($f);
    }
    // take content
    public function takeContent()
    {   
        $gString = str_replace( $this->takeTitle(),' ', $this->__deleteGarbage());
        $gString = parent::deleteBefore('/class="ArticleContent">/', $gString);
        return strip_tags($gString);
    }
}
?>