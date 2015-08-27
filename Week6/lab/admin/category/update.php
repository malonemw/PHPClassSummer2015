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
            
            $category = "";
            $category_id ="";
            
           $category_id = filter_input(INPUT_GET, 'category_id');
            
           $db = dbconnect();
           
           $stmt = $db->prepare("SELECT * FROM categories WHERE category_id = :category_id");
           
           $binds = array(
                ":category_id" => $category_id,
                );
           
            $pullArray = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $pullArray = $stmt->fetch(PDO::FETCH_ASSOC);
            }
           
            
            if (isPostRequest()){
            $category_id = filter_input(INPUT_POST, 'category_id');
            $category = filter_input(INPUT_POST, 'category');            
            }
            
           ?>
        
        <h1>Update Product</h1>
        
            <form method="post" action="#">            
                Category: <input type="text" name="category" value="<?php echo $category?>" />
            <br />
            </form>
               
        
        <?php    
        $action = filter_input(INPUT_POST, 'action');
        
        if ($action === 'submit'){
                
            $stmt = $db->prepare("UPDATE categories SET category = :category, WHERE category_id = :category_id");
            $binds = array(
                ":category_id" => $category_id,
                ":category" => $category,                                   
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
        
        <a href="./index.php"> Back to View All Categories </a>
                
        
    </body>
</html>