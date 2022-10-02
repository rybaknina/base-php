<?php

class Cart
{
    private array $products = [];

    public function getTotalCost(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function deleteProduct(Product $product) {
        $key = array_search($product, $this->products, true);
        if ($key !== false) {
            unset($this->products[$key]);
        }
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     * @return Cart
     */
    public function setProducts(array $products): self
    {
        $this->products = $products;
        return $this;
    }

}