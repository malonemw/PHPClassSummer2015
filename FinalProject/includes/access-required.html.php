

<?php if ( !isset($_SESSION['user_id']) || intval($_SESSION['user_id']) <= 0 ) : ?>
    <p><a href="../index.php">Home</a></p>
<?php die('Access Denied '); endif;  ?>