<?php namespace App\Extensions\TreeStructure;

class Collection
{
    private $data = [];

    /**
     * Collection constructor.
     * @param object[]
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Search instance of object by property name and value
     * @param string $propertyName
     * @param $value
     * @return object|null
     */
    public function findOne(string $propertyName, $value): ?object
    {
        foreach ($this->data as $item)
        {
            if (property_exists($item, $propertyName) && $item->$propertyName == $value)
            {
                return $item;
            }
        }

        return null;
    }
}