<?php namespace App\Extensions\TreeStructure;

use App\Exceptions\MapperException;
use App\Models\ListItem;
use App\Models\TreeItem;
use JsonMapper;
use JsonMapper_Exception;

class Mapper implements Imapper
{
    private $mapper;

    /**
     * Mapper constructor.
     */
    public function __construct()
    {
        $this->mapper = new JsonMapper();
    }

    /**
     * Map json array to array of ListItem
     * @param array $data
     * @return iterable
     * @throws MapperException
     */
    function mapListItems(array $data): iterable
    {
        try {
            return $this->mapper->mapArray($data, [], ListItem::class);
        } catch (JsonMapper_Exception | \InvalidArgumentException $e) {
            throw new MapperException("Error during ListItem mapping");
        }
    }

    /**
     * Map json array to array of TreeItem
     * @param array $data
     * @return iterable
     * @throws MapperException
     */
    function mapTreeItems(array $data): iterable
    {
        try {
            return $this->mapper->mapArray($data, [], TreeItem::class);
        } catch (JsonMapper_Exception | \InvalidArgumentException $e) {
            throw new MapperException("Error during TreeItem mapping");
        }
    }
}