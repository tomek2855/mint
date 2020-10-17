<?php namespace Tests;

use App\Extensions\TreeStructure\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    private $data;

    private $ironMan;
    private $superMan;

    protected function setUp(): void
    {
        $this->ironMan = new CollectionItemTest("Iron Man");
        $this->superMan = new CollectionItemTest("Super Man");

        $this->data = [$this->ironMan, $this->superMan];
    }

    public function testSearchReturnsInstance(): void
    {
        $collection = new Collection($this->data);

        $object = $collection->findOne('name', 'Super Man');

        $this->assertInstanceOf(CollectionItemTest::class, $object);
        $this->assertEquals('Super Man', $object->name);
    }

    public function testSearchNotExistingValue(): void
    {
        $collection = new Collection($this->data);

        $nullObject = $collection->findOne('name', 'not not not');

        $this->assertNull($nullObject);
    }

    public function testSearchNotExistingProperty(): void
    {
        $collection = new Collection($this->data);

        $nullObject = $collection->findOne('not not not', 'Super Man');

        $this->assertNull($nullObject);
    }
}

class CollectionItemTest
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}