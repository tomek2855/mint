<?php namespace App\Extensions\TreeStructure;


final class MapperFactory
{
    /**
     * @return IMapper
     */
    public static function create(): IMapper
    {
        return new Mapper();
    }
}