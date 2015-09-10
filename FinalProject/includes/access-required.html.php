

<?php if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true ) : ?>
    <p><a href="../index.php">Home</a></p>
<?php die('Access Denied '); endif;  ?>