<?php
function dbconnect() {
 //   $config = array(
   //     'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=corps',
     //   'DB_USER' => 'php',
       // 'DB_PASSWORD' => 'summer15'
   // );
    try
{
  $db = new PDO('mysql:host=localhost;dbname=corps', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}    

  return $db;   
}
?>