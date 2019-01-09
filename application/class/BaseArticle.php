<?php
    // abstract class BaseArticle extends BaseCrawler 
    // {
    //     abstract public function deleteGarbage();
    //     abstract public function takeTitle();
    //     abstract public function takeContent();
    // }

    class BaseArticle extends AbstractFactoryMethod 
    {
        public function makePhpClass($param)
        {
            $name = null;
            switch($param) {
            case "VnExpress":
                $name = new VnExpress();
            break;
            case "VietnamNet":
                $name = new VietnamNet();
            break;
            }
            return $name;
        }
    }
?>