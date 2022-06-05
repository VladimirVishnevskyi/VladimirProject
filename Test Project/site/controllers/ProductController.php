<?php

class ProductController
{

    public function listAction()
    {
        $Class = \Model\Product\Repository::getOne($_GET['id']);

    }
    public function searchAction(){
        $products = \Model\Product\Repository::searchIn($_GET['query']);
    }
}