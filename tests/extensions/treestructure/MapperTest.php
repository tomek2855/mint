<?php namespace Tests;

use App\Exceptions\MapperException;
use App\Extensions\TreeStructure\IMapper;
use App\Extensions\TreeStructure\Mapper;
use PHPUnit\Framework\TestCase;

class MapperTest extends TestCase
{
    private $listJson;
    private $treeJson;

    protected function setUp(): void
    {
        $this->listJson = json_decode(file_get_contents(__DIR__ . '../../../resources/list.json'));
        $this->treeJson = json_decode(file_get_contents(__DIR__ . '../../../resources/tree.json'));
    }

    public function testMapperIsInstanceOfIMapper(): void
    {
        $mapper = new Mapper();

        $this->assertInstanceOf(IMapper::class, $mapper);
    }

    public function testCanMapListItemsFromValidJsonData(): void
    {
        $mapper = new Mapper();
        $mapped = $mapper->mapListItems($this->listJson);

        $this->assertCount(10, $mapped);
        $this->assertEquals(1, $mapped[0]->category_id);
    }

    public function testCannotMapListItemsFromInvalidJsonData(): void
    {
        $this->expectException(MapperException::class);

        $mapper = new Mapper();
        $mapper->mapListItems([
            ['not' => 'exists']
        ]);
    }

    public function testCanMapTreeItemsFromValidJsonData(): void
    {
        $mapper = new Mapper();
        $mapped = $mapper->mapTreeItems($this->treeJson);

        $this->assertCount(6, $mapped);
    }

    public function testCannotMapTreeItemsFromInvalidJsonData(): void
    {
        $this->expectException(MapperException::class);

        $mapper = new Mapper();
        $mapper->mapTreeItems([
            ['not' => 'exists']
        ]);
    }
}