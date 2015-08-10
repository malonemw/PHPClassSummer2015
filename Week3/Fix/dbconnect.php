<?php
function dbconnect() {
 //   $config = array(
   //     'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPClassSummer2015',
     //   'DB_USER' => 'php',
       // 'DB_PASSWORD' => 'summer15'
   // );
    try
{
  $db = new PDO('mysql:host=localhost;dbname=PHPClassSummer2015', 'php', 'summer15');
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