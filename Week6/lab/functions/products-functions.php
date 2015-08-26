<?php
//products
//product_id
//category_id
//product
//price
//image

function createProduct(){
    
    $db = dbconnect($category_id, $product, $price, $image);
    
                   
            $stmt = $db->prepare("INSERT INTO categories SET category_id = :category_id, :product = product, :price = price, :image = image");
            $binds = array(
                ":category_id" => $category_id,
                ":product" => $product,
                ":price" => $price,
                ":image" => $image
             );
           
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                 return true;
            }
            return false;
        }
