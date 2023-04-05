<?php

namespace App\Model;

class PlaceListResponse
{
    private array $items;

    /**
     * @param PlaceListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return PlaceListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}