<?php 


class CartNew{

    private Product $product;
    private $items = [];


    /**
     * set new item in cart
     *
     * @param Product $product
     * @param integer $qty
     * @return void
     */

    public function addToCart(Product $product,$qty=1){
        if($product->getQty() >= $qty){
            $this->items[$product->getId()] = new CartItem($product,$qty);
        }else{
            throw new Exception("Please Insert available quantity !");
        }
    }


    /**
     * get item from cart list
     *
     * @param [int] $productId
     * @return array 
     */
    public function getItem($productId){
        if(array_key_exists($productId,$this->items)){
            return $this->items[$productId];
        }
        return null;
    }


    
    /**
     * check if item exist or not 
     *
     * @param [int] $productId
     * @return array 
     */
    public function findItem($productId){
        if(array_key_exists($productId,$this->items)){
            return true;
        }
        return false;
    }



    /**
     * update exixsting item 
     *
     * @param Product $product
     * @param int $qty
     * @return void
     */
    public function updateItem(Product $product,$qty=1){
        $this->addToCart($product,$qty);
    }

    public function checkAvaliability(Product $product,int $qty){
        if($product->getQty() >= $qty){
            return true;
        }
        throw new Exception("Not Available !");
    }


    /**
     * remove item from cart list
     *
     * @param int $productId
     * @return void
     */
    public function removeItem($productId){
        if($this->findItem($productId)){
            unset($this->items[$productId]);
        }
    }



    /**
     * get total price of items in cart lasit
     *
     * @return float
     */
    public function getTotalPrice(){
        $price = 0;
        foreach($this->items as  $item){
                $price += $item->getProduct()->getPrice() * $item->getProduct()->getQty();
        }
        return $price;
    }


    /**
     * display all items in cart list
     *
     * @return array 
     */
    public function getAllItems(){
        return $this->items;
    }
}