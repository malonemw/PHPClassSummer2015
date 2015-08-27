<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            
            include_once '../../functions/dbconnect.php';
            include_once '../../functions/category-functions.php';
            include_once '../../functions/products-functions.php';
            include_once '../../functions/until.php';
            
            
           $id = filter_input(INPUT_GET, 'product_id');
            
           $db = dbconnect();
           
           $stmt = $db->prepare("SELECT * FROM categories where product_id = :product_id");
           
           $binds = array(
                ":product_id" => $product_id
            );
           
            $pullArray = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $pullArray = $stmt->fetch(PDO::FETCH_ASSOC);
            }
           
            
            if (isPostRequest()){
            $product_id = filter_input(INPUT_POST, 'product_id');
            $category_id = filter_input(INPUT_POST, 'category_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $image = filter_input(INPUT_POST, 'image');
            }
            
           ?>
        
        <h1>Update Product</h1>
        
            <form method="post" action="#">            
                Product: <input type="text" name="product" value="<?php echo $product['product'] ?>" />
            <br />
            Price: <input type="text" name="price" value="<?php echo $price['price'] ?>"/>
            <br />
            Image: <input type="image" name="image" value="<?php echo $image['image'] ?>"/>
            <br />
            
            <!-- for each category, pull category id; input category id -->
            Category: <select> value="<?php echo $category_id['image'] ?>"/>
            <br />
            <input type="hidden" name="product_id" value="<?php echo $product_id ?>" />
            <input type="submit" value="Submit" />
            <input type="hidden" name="action" value="submit"/>
        </form>
        
        
        <?php    
        $action = filter_input(INPUT_POST, 'action');
        
        if ($action === 'submit'){
                
            $stmt = $db->prepare("UPDATE categories SET product = :product, price = :price, image = :image, category_id = :category_id WHERE product_id = :product_id");
            $binds = array(
                ":category_id" => $category_id,
                ":product_id" => $product_id,
                 ":product" => $product,                 
                 ":price" => $price,                   
                 ":image" => $image                  
             );
            $result = 'Data was not updated';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                 $result = 'Data has been updated';
            }
        }

        ?>
        
        <h1>
        <?php if ( !empty($result) ) {
            echo $result;
        } ?>
        </h1>
        
        <a href="./view.php"> Back to View All </a>
                
        
    </body>
</html>