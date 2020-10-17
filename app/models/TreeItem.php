<?php namespace App\Models;

class TreeItem
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var TreeItem[]
     */
    public $children = [];
}