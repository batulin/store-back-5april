<?php

namespace App\Model;

class TypeOfPlaceListResponse
{
    private array $items;

    /**
     * @param TypeOfPlaceListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return TypeOfPlaceListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}