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
            
            
           $category_id = filter_input(INPUT_GET, 'id');

            
           $db = dbconnect();
         
           //function out post request  set variables, pass, and return
            if (isPostRequest()){
            $category_id = filter_input(INPUT_POST, 'category_id');
            $category = filter_input(INPUT_POST, 'category');
            //var_dump($category);
            $db2 = dbconnect();
                
            $stmt2 = $db2->prepare("UPDATE categories SET category = :category WHERE category_id = :category_id");
            $bind = array(
                ":category_id" => $category_id,
                ":category" => $category                                 
             );
            $result = 'Data was not updated';
            if ($stmt2->execute($bind)) {
                 $result = 'Data has been updated';
            }
            }
            
            // Function out for prepare
            $stmt = $db->prepare("SELECT * FROM categories WHERE category_id = :category_id");
           
           $binds = array(
                ":category_id" => $category_id
                );
           
            $categories = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $categories = $stmt->fetch(PDO::FETCH_ASSOC);
            }
           ?>
        
        
        
        <?php include '../../includes/results.html.php'; ?>
        
        <h1>Update Category</h1>
        
            <form method="post" action="#">            
                Category: <input type="text" name="category" value="<?php echo $categories['category'] ?>" />
            <br />
            <input type="hidden" name="category_id" value="<?php echo $categories['category_id'] ?>" />
            <input type="submit" value="Submit" />
            </form>
               
        
        
        
        <a href="./index.php"> Back to View All Categories </a>
                
        
    </body>
</html>