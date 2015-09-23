<?php
/*
 * products
 * product_id
 * category_id
 * product
 * pd876rice
 * image
 */

    

function createAddress($fullname, $email, $address, $phone, $group_id, $website, $birthday, $image, $user_id) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, address = :address, phone = :phone, address_group_id = :address_group_id, website = :website, birthday = :birthday, image = :image, user_id = :user_id " );
    $binds = array(
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":address_group_id" => $group_id,
        ":website" => $website,
        ":birthday" => $birthday,
        ":image" => $image,
        ":user_id" => $user_id
    );
    var_dump($fullname,$email,$address,$birthday,$phone,$website,$image, $user_id);
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    else{ 
    return false;
    }
    
    
}

function getAddressGroup() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address_groups");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

function updateAddress($fullname, $email, $address, $phone, $group_id, $website, $birthday, $image, $user_id) {
    $db = dbconnect();
    $stmt = $db->prepare("UPDATE address SET fullname = :fullname, email = :email, address = :address, phone = :phone, address_group_id = :address_group_id, website = :website, birthday = :birthday, image = :image, user_id = :user_id " );
            $binds = array(
            ":fullname" => $fullname,
            ":email" => $email,
            ":address" => $address,
            ":phone" => $phone,
            ":address_group_id" => $group_id,
            ":website" => $website,
            ":birthday" => $birthday,
            ":image" => $image,
            ":user_id" => $user_id
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
