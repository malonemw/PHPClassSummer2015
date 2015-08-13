<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                
        //$id = filter_input(INPUT_GET, 'id');
        
        include './dbconnect.php';
            
           $db = dbconnect();
           
          // $stmt = $db->prepare("SELECT * FROM corps");
           $stmt = $db->prepare("SELECT * FROM corps");
           
           //$binds = array(
             //   ":id" => $id
            //);
           
            $result = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
            
        ?>
        
        <?php if ( count($result) > 0 ) : ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Company Name</th>                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a href="<?php echo './READ.php'; ?>"> Read </a></td>
                    <td><a href="<?php echo './UPDATE.php'; ?>"> Update </a></td> 
                    <td><a href="<?php echo './DELETE.php'; ?>"> Delete </a></td>               
                </tr>
               
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php else: ?>
        <h1>No Results Found</h1>
       <?php endif; ?>
    </body>
