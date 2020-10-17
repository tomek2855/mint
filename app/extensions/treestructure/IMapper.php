<?php namespace App\Extensions\TreeStructure;

interface IMapper
{
    function mapListItems(array $data): iterable;

    function mapTreeItems(array $data): iterable;
}