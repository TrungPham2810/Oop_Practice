<?php
include ('BaseCrawler.php');
class VietnamNet extends BaseCrawler
{
    private $__search1 = 'class="title f-22 c-3e">';
    private $__search2 = '<div class="inner-article"';
    private $__search3 = '</h1>';

    private function __deleteGarbage() {
        $b = parent::takeCodeWebsite();
        // xóa đoạn code bên trên tiêu đề
        $b = parent::deleteBefore($this->__search1, $b);
        $b = parent::deleteAfter($this->__search2, $b);
        return $b;
    }

    public function takeTitle()
    {
        $f = parent::deleteAfter($this->__search3, $this->__deleteGarbage());
        return strip_tags($f);
    }

    public function takeContent()
    {   
        $gString = str_replace( $this->takeTitle(),' ', $this->__deleteGarbage());
        $gString = parent::deleteBefore('class="ArticleContent">', $gString);
        return strip_tags($gString);
    }
}
?>