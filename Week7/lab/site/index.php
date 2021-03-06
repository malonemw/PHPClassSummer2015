<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../includes/session-start.req-inc.php';
            require_once '../functions/cart-functions.php';
            require_once '../functions/dbconnect.php';
            require_once '../functions/until.php';
            require_once '../functions/category-functions.php';
            require_once '../functions/products-functions.php';
                        
            startCart();            
            
            $allCategories = getAllCategories();            
            $allProducts = getAllProducts();
            
            $categorySelected = filter_input(INPUT_GET, 'cat');
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
            
            if $action === 'clear')
           
            include_once '../includes/categories.html.php';
            include_once '../includes/products.html.php';
            

            
            // add button with action 
        ?>
        <input type="submit" value="Clear Cart"
        <input type="hidden" name="action" value="clearCart"/>
        <a href="../site/checkout.php"> Proceed to Checkout </a>
        
    </body>
</html>