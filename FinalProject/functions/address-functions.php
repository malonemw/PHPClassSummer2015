<?php
/*
 * products
 * product_id
 * category_id
 * product
 * price
 * image
 */
function createAddress($fullname, $email, $address, $phone, $website, $birthday, $image) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, address = :address, phone = :phone, website = :website, birthday = :birthday, image = :image" );
    $binds = array(
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website,
        ":birthday" => $birthday,
        ":image" => $image
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
