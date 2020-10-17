<?php namespace Tests;


use App\Extensions\TreeStructure\IMapper;
use App\Extensions\TreeStructure\MapperFactory;
use PHPUnit\Framework\TestCase;

class MapperFactoryTest extends TestCase
{
    public function testCanCreateMapper(): void
    {
        $this->assertInstanceOf(IMapper::class, MapperFactory::create());
    }
}