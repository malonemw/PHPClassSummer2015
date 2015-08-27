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
            
            
           $id = filter_input(INPUT_GET, 'category_id');
            
           $db = dbconnect();
           
           $stmt = $db->prepare("SELECT * FROM categories where category_id = :category_id");
           
           $binds = array(
                ":category_id" => $category_id
            );
           
            $pullArray = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $pullArray = $stmt->fetch(PDO::FETCH_ASSOC);
            }
           
            
            if (isPostRequest()){
            $category_id = filter_input(INPUT_POST, 'category_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $image = filter_input(INPUT_POST, 'image');
            }
            
           ?>
        
        <h1>Update Product</h1>
        
            <form method="post" action="#">            
                Company: <input type="text" name="product" value="<?php echo $product['product'] ?>" />
            <br />
            Email: <input type="email" name="price" value="<?php echo $price['price'] ?>"/>
            <br />
            Image: <input type="image" name="image" value="<?php echo $image['image'] ?>"/>
            <br />
            <input type="hidden" name="category_id" value="<?php echo $category_id ?>" />
            <input type="submit" value="Submit" />
            <input type="hidden" name="action" value="submit"/>
        </form>
        
        
        <?php    
        $action = filter_input(INPUT_POST, 'action');
        
        if ($action === 'submit'){
                
            $stmt = $db->prepare("UPDATE categories SET product = :product, price = :price, image = :image WHERE category_id = :category_id");
            $binds = array(
                ":category_id" => $category_id,
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