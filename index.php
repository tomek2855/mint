<?php

require_once './vendor/autoload.php';

function getJsonFromFile(string $path)
{
    return json_decode(file_get_contents($path));
}

$mapper = \App\Extensions\TreeStructure\MapperFactory::create();

$treeJson = getJsonFromFile('resources/tree.json');
$listJson = getJsonFromFile('resources/list.json');

$tree = $mapper->mapTreeItems($treeJson);
$list = $mapper->mapListItems($listJson);

$collection = new \App\Extensions\TreeStructure\Collection($list);

$result = \App\Extensions\TreeStructure\Resolver::resolve($collection, $tree);

echo json_encode($result);