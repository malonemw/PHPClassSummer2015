<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
         require_once '../includes/session-start.req-inc.php';
         require_once '../includes/access-required.html.php';
         
        include_once '../functions/dbconnect.php';
        //include_once '../../functions/category-functions.php';
        //include_once '../../functions/products-functions.php';
        include_once '../functions/until.php';
        
        
        
        
        //$categories = getAllCategories();
        
        
        if ( isPostRequest() ) {
                        
            $fullname = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $phone = filter_input(INPUT_POST, 'phone');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $image = uploadProductImage();
                        
            $errors = array();
            
//            if ( !isValidProduct($product) ) {
//                $errors[] = 'Product is not Valid';
//            }
//            
//            if ( !isValidPrice($price) ) {
//                $errors[] = 'Price is not Valid';
//            }
                //return a string '' instead of bool        
            if ( $image == '' ) {
                $errors[] = 'image could not be uploaded';
            }
            // want to check for correct files before uploading image
            if ( count($errors) == 0 ) {
                
                if ( createAddress($fullname, $email, $address, $phone, $website, $birthday, $image ) ) {
                    $results = 'Product Added';
                } else {
                    $results = 'Product was not Added';
                }
                
            }
            
        }
        
        
        
        ?>
        
        <h1>Add Product</h1>
        
        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        
        <?php include '../../includes/results.html.php'; ?>
               
        <form method="post" action="#" enctype="multipart/form-data">
            
            Category:
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            
            
            Product Name : <input type="text" name="product" value="" /> 
            <br />
            Price : <input type="text" name="price" value="" /> 
            <br />            
             Image: <input name="upfile" type="file" />
             <br />
            <input type="submit" value="Submit" />
        </form>
        
        
        
    </body>
</html>