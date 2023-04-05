<?php

namespace App\Model;

class TypeListResponse
{
    /**
     * @param TypeListItem[] $items
     */
    public function __construct(private readonly array $items)
    {
    }

    /**
     * @return TypeListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}