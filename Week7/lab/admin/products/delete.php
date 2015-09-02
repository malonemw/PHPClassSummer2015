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
            
        include_once '../../functions/category-functions.php';
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/until.php';
        
        $product_id = filter_input(INPUT_GET, 'product_id');
        
        $db = dbconnect();
           
        $stmt = $db->prepare("DELETE FROM products where product_id = :product_id");
           
        $binds = array(
             ":product_id" => $product_id
        );
           
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }         
        
        ?>
        
        <h1> Record <?php echo $product_id; ?> Has 
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Been Deleted
        </h1>
        
        <a href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>"> Back to View All </a>
         
    </body>
</html>