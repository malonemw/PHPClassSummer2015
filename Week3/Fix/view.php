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
           
           $stmt = $db->prepare("SELECT * FROM corps");
          // $stmt = $db->prepare("SELECT * FROM corps where id = :id");
           
           //$binds = array(
           //     ":id" => $id
            //);
           
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
                <tr>
                    <td><?php echo $result['corps']; ?></td>                   
                </tr>
            </tbody>
        </table>
        
        <?php else: ?>
        <h1>No Results Found</h1>
       <?php endif; ?>
    </body>
