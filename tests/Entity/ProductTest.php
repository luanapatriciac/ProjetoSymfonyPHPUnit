<?php

namespace Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testcomputeTVAFoodProduct()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, 10);
        $this->assertSame(0.55, $product->computeTVA());
    }

    // public function testcomputeTVAFoodProduct($price, $expectedTva)
    // {
    //     $product = new Product('Un produit', Product::FOOD_PRODUCT, $price);

    //     $this->assertSame($expectedTva, $product->computeTVA());
    // }

    // public function pricesForFoodProduct()
    // {
    //     return [
    //         [0, 0.0],
    //         [20, 1.1],
    //         [100, 5.5]
    //     ];
    // }

    public function testcomputeTVAOtherProduct()
    {
        $product = new Product('Un produit', 'Autre produit', 10);
        $this->assertSame(1.96, $product->computeTVA());
    }

    public function testcomputeTVANegativePrice()
    {
        $product = new Product('Un produit', 'Autre produit', -10);
        $this->expectException('LogicException');
        $product->computeTVA();
    }
}
