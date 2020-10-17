<?php namespace App\Models;

class ListItem
{
    /**
     * @var integer
     */
    public $category_id;

    /**
     * @var ListTranslationItem[]
     */
    public $translations = [];
}