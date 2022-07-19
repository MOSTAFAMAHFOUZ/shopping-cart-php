<?php 


class Cart{

    private Product $product;
    private $items = [];


    /**
     * set new item in cart
     *
     * @param Product $product
     * @param integer $qty
     * @return void
     */
    public function setItem(Product $product,$qty=1){
        if($qty <= $product->getQty()){
            $this->items[] = ['product'=>$product,'qty'=>$qty];
        }else{
            throw new Exception("Please Insert available quantity !");
        }
    }


    public function addToCart(Product $product,$qty=1){
        if($qty <= $product->getQty()){
            $this->items[] = new CartItem($product,$qty);
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
        $cartItem = null;
        foreach($this->items as $item){
            if($item['product']->getId() == $productId){
                 $cartItem = $item;
                break;
            }
        }
        return $cartItem;
    }


    
    /**
     * check if item exist or not 
     *
     * @param [int] $productId
     * @return array 
     */
    public function findItem($productId){

        foreach($this->items as $item){
            if($item['product']->getId() == $productId){
                return $item;
                break;
            }
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
    public function updateItem(Product $product,$qty){
        foreach($this->items as $key => $item){
            if($item['product']->getId() == $product->getId()){
                 $this->items[$key] = ['product'=>$product,'qty'=>$qty];
                break;
            }
        }
    }


    /**
     * remove item from cart list
     *
     * @param int $productId
     * @return void
     */
    public function removeItem($productId){
        foreach($this->items as $key => $item){
            if($item['product']->getId() == $productId){
                 unset($this->items[$key]);
                break;
            }
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
                $price += $item['product']->getPrice() * $item['qty'];
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