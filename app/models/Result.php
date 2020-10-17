<?php namespace App\Models;

class Result
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var Result[]
     */
    public $children = [];
}