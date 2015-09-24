<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../../includes/session-start.req-inc.php';
            require_once '../../includes/access-required.html.php';        
            
            include_once '../../functions/dbconnect.php';
            include_once '../../functions/category-functions.php';
            include_once '../../functions/products-functions.php';
            include_once '../../functions/until.php';
            
            
           $product_id = filter_input(INPUT_GET, 'id');
           $categoriesdb = getAllCategories(); 
           
           
           
           if (isPostRequest()){
            $product_id = filter_input(INPUT_POST, 'product_id');
            $category_id = filter_input(INPUT_POST, 'category_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $image = filter_input(INPUT_POST, sha1('image'));
            
                                 
                
            $stmt = $db->prepare("UPDATE products SET product = :product, price = :price, image = :image, category_id = :category_id WHERE product_id = :product_id");
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
        
        
        
           $stmt = $db->prepare("SELECT * FROM products JOIN categories ON categories.category_id = products.category_id WHERE product_id = :product_id");
           
           $binds = array(
                ":product_id" => $product_id
            );
           
            $products = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $products = $stmt->fetch(PDO::FETCH_ASSOC);
            }
                      
           ?>
        
        
        
        <h1>Update Product</h1>
        
         <h1>
        <?php if ( isset($result) ) {
            echo $result;
        } ?>
             
        </h1>
        
            <form method="post" action="#">            
                Product: <input type="text" name="product" value="<?php echo $products ['product'] ?>" />
            <br />
            Price: <input type="text" name="price" value="<?php echo $products['price'] ?>"/>
            <br />
            Image: <input name="upfile" type="file" value="<?php echo $products['image'] ?>" />
            <br />
            
            <!-- for each category, pull category id; input category (JOIN TABLES) -->
            Category: <select name="category_id">
            <?php foreach ($categoriesdb as $row): ?>
                <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category']; ?></option>
            <?php endforeach; ?>
            </select>
            <br />
            <input type="hidden" name="product_id" value="<?php echo $product_id ?>" />
            <input type="submit" value="Submit" />            
        </form>
        
        
        
        
       
        
        <a href="./index.php"> Back to Products </a>
                
        
    </body>
</html>