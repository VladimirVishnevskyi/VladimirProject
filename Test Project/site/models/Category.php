<?php

namespace Model;
class Category extends \Model\AbstractModel
{


    public $name;
    public $category_id;
    public $image;


    public function getUrl()
    {
        return "front.php?controller=category&action=list&id=" . $this->category_id;
    }

    public function getImage()
    {
        return "uploads/product/" . $this->image;
    }
}
