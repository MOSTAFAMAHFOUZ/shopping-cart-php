<?php 


include 'Product.php';
include 'CartItem.php';
include 'Cart.php';


$item1 = new Product(1,"first product",50,10);
$item2 = new Product(2,"second product",100,20);
$item3 = new Product(33,"third product",200,15);






$item = new Cart();
$item->addToCart($item1,10);
$item->addToCart($item2,2);
$item->addToCart($item3,3);

echo "<pre>";
print_r($item->getTotalPrice());
// print_r($item->getAllItems());
// remove item 
// print_r($item->removeItem(33));
// print_r($item->getAllItems());
// get item 
// print_r($item->getItem(33));
// update item
// print_r($item->updateItem($item3,15));
// get item 
// print_r($item->getItem(2));
// print_r($item->getItem(22));



// using cart direct 

// $item = new Cart();
// $item->setItem($product1,10);
// $item->setItem($product2,2);
// $item->setItem($product3,3);

// // $item->updateItem($product1,10);
// // $item->removeItem(1);
// echo "<pre>";
// // print_r($item->findItem(1));
// // print_r($item->getAllItems());
// print_r($item->getTotalPrice());



