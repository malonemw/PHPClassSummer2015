<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                
        $id = filter_input(INPUT_GET, 'id');
        
        include_once './dbconnect.php';
            
           $db = dbconnect();
           
          // $stmt = $db->prepare("SELECT * FROM corps");
           $stmt = $db->prepare("SELECT * FROM corps where id = :id");
           
           $binds = array(
                ":id" => $id
            );
           
            $result = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
                 <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo 'Read';?></td>
                    <td><?php echo 'Update'; ?></td> 
                    //add links
                    <td><?php echo 'Delete';?></td>               
                </tr>
               
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php else: ?>
        <h1>No Results Found</h1>
       <?php endif; ?>
    </body>
