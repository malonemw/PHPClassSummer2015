<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../../includes/session-start.req-inc.php';
            require_once '../../includes/access-required.html.php';
        ?>
        
        <p><a href="create.php">Create</a></p>
        <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>"> Update </a></td> 
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>"> Delete </a></td>               
                </tr>
              
            <?php endforeach; ?>
    </body>
</html>