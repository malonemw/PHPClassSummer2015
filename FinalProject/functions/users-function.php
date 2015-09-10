<?php
/*
 * products
 * product_id
 * category_id
 * product
 * price
 * image
 */
function createUser($email, $password) {
   
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW()");
    $binds = array(
        ":email" => $email,
        ":password" => sha1($password)
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    else{ 
    return false;
    }
    
    
}

function isValidPassword($password) {
    if ( strlen($password) < 4 ) {
        return false;
    }
    return true;    
}


?>
