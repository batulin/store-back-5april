<?php

namespace App\Model;

use App\Entity\Brand;

class BrandListResponse
{
    /**
     * @param BrandListItem[] $items
     */
    public function __construct(private readonly array $items)
    {
    }

    /**
     * @return BrandListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}