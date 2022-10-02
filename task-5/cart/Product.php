<?php

class Product
{
    private ?float $price;

    /**
     * @param string $title
     * @param float|null $price
     * @param array|null $components
     */
    public function __construct(private string $title, ?float $price = 0, private ?array $components = [])
    {
        if (empty($components)) {
            $this->price = $price;
        } else {
            $this->updatePrice();
            $this->price += $price;
        }
    }

    private function updatePrice()
    {
        $price = 0;
        foreach ($this->components as $component) {
            $price += $component->getPrice();
        }
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return float|int|null
     */
    public function getPrice(): float|int|null
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    /**
     * @param array $components
     * @return Product
     */
    public function setComponents(array $components): self
    {
        $this->components = $components;
        $this->updatePrice();
        return $this;
    }
}