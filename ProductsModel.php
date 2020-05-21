<?php

namespace Arden;

class ProductsModel extends Model
{
    public function __construct()
    { 
         $this->products = DB::getInstance()->query('SELECT product_id, SUM(`order_quantity`) AS TotalQuantity, products.name, products.image FROM orders INNER JOIN products on products.id = orders.product_id GROUP BY product_id HAVING SUM(`order_quantity`) ORDER by order_quantity DESC LIMIT 5');                
        if(!empty($this->products)) {
            foreach($this->products->results() as $product) {
                $this->data[] = [ 'name'=>$product->name, 'image'=>$product->image ];
            }
        } 
    }

    public function getData()
    {
        return $this->data;
    }

    public function insertData($name, $email, $msg) {   
   
        $this->insertResult = DB::getInstance()->insert("INSERT INTO contacts (id, name, email, message, created_datetime) VALUES (NULL, '$name', '$email', '$msg', '2020-05-20 20:52:13')");
        return  $this->insertResult;
    }
}