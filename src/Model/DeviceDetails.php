<?php

namespace App\Model;

class DeviceDetails
{
    private int $id;
    private string $name;
    private int $price;
    private int $rating;
    private string $img;

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
    public function getRating(): int
    {
        return $this->rating;
    }
    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }



}