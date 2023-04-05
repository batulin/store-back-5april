<?php

namespace App\Model;

class ClientListResponse
{
    /**
     * @param ClientListItem[] $items
     */
    public function __construct(private readonly array $items)
    {
    }

    /**
     * @return ClientListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}