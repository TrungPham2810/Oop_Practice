<?php
    abstract class AbstractFactoryMethod extends BaseCrawler 
    {
        abstract public function makePhpClass($param);
    }
?>