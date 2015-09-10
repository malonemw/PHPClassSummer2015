<?php
/*
 * products
 * product_id
 * category_id
 * product
 * price
 * image
 */
function createUser($email, $password, $create ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, create = :create ");
    $binds = array(
        ":email" => $email,
        ":password" => $password,
        ":create" => $create,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
    
}
//function getAllProducts() {
//    $db = dbconnect();
//    $stmt = $db->prepare("SELECT * FROM products JOIN categories WHERE categories.category_id = products.category_id");
//    $results = array();
//    if ($stmt->execute() && $stmt->rowCount() > 0) {
//        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }
//     
//    return $results;
//    
//}
//function getProduct($id) {
//    $db = dbconnect();
//    $stmt = $db->prepare("SELECT * FROM products JOIN categories WHERE categories.category_id = products.category_id AND product_id = :product_id");
//     $binds = array(
//        ":product_id" => $id
//    );
//    
//    $results = array();
//    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
//        $results = $stmt->fetch(PDO::FETCH_ASSOC);
//    }
//     
//    return $results;
//    
//}
function isValidPassword($value) {
    if ( $value < 4 ) {
        return false;
    }
    return true;    
}
//function isValidPrice($value) {
//    if ( empty($value) ) {
//        return false;
//    }
//    return true;
//}

?>