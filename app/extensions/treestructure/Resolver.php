<?php namespace App\Extensions\TreeStructure;

use App\Models\Result;
use App\Models\TreeItem;

class Resolver
{
    /**
     * @param Collection $listCollection
     * @param TreeItem[] $treeItems
     * @return Result[]
     */
    public static function resolve(Collection $listCollection, array $treeItems): iterable
    {
        $result = [];

        foreach ($treeItems as $treeItem)
        {
            $result[] = self::resolveOne($listCollection, $treeItem);
        }

        return $result;
    }

    /**
     * @param Collection $listCollection
     * @param TreeItem $treeItem
     * @return Result
     */
    private static function resolveOne(Collection $listCollection, TreeItem $treeItem): Result
    {
        $result = new Result();

        $translation = $listCollection
                ->findOne('category_id', $treeItem->id)
                ->translations['pl_PL']
                ->name ?? '';

        $result->id = $treeItem->id;
        $result->name = $translation;

        foreach ($treeItem->children as $child)
        {
            $result->children[] = self::resolveOne($listCollection, $child);
        }

        return $result;
    }
}