<?php

require_once "Product.php";
require_once "Cart.php";

$display = new Product("Display 19'", 15);
$systemBlock = new Product("System block", 30);
$ups = new Product("Ups", 20);
$comp = new Product("PC", 10, [$display, $systemBlock, $ups]);
$usb = new Product("usb 3.0 100GB", 6);
$cart = new Cart();

$cart->addProduct($comp);
echo "Total cost (comp): " . $cart->getTotalCost() . PHP_EOL;

$cart->addProduct($usb);
echo "Total cost (comp + usb): " . $cart->getTotalCost() . PHP_EOL;

$cart->deleteProduct($usb);
echo "Total cost without usb: " . $cart->getTotalCost() . PHP_EOL;

$cart->deleteProduct($comp);
echo "Total cost (empty): " . $cart->getTotalCost() . PHP_EOL;