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
        
        $categories = getAllCategories();
        
        if (isPostRequest()){
            
            $category_id = filter_input(INPUT_POST, 'category_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            $image = filter_input(INPUT_POST, 'image');
            
            $errors = array();
            
            if(!isValidProduct($product)){
                $errors[] = 'Price is not Valid';
            }
            if(!isValidPrice($price)){
                $errors[] = 'Price is not Valid';
            }            
                //return a string '' instead of bool        
            if ( false === $image ) {
                $errors[] = 'image could not be uploaded';
            }
            if (count ($errors) == 0){
                if (createProduct($category_id, $product, $price, $image)){
                    $results = 'Product Added';
                }
                else{'Product not Added';
                }
            }
            
        }
        ?>
        
        
        
        <h1>Add Product</h1>
        
        <?php if ( isset($errors) && count($errors) == 0 ) : ?>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
            <?php endif; ?>
         
        <?php include '../../includes/results.html.php';?>
        
        <form method="post" action="#">
            
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            
            
            Product Name : <input type="text" name="product" value="" /> 
            <br />
            Price : <input type="text" name="price" value="" /> 
            <br />
            <input type="submit" value="Submit" />
        </form>
        
        
        
    </body>
</html>