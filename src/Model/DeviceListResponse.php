<?php

namespace App\Model;

use App\Entity\Device;

class DeviceListResponse
{
    /**
     * @param DeviceListItem[] $items
     */
    public function __construct(private readonly array $items)
    {
    }

    /**
     * @return DeviceListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}