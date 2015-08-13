<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                
        $id = filter_input(INPUT_GET, 'id');
        
        include './dbconnect.php';
        include './functions.php';
            
           $db = dbconnect();
           
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
    <body> 
        <label>Company: </label><?php echo $result['corp']; ?>
        </br>
        <label>Incorporated Date: </label><?php echo $result['incorp_dt']; ?>
        </br>
        <label>Email: </label><?php echo $result['email'];?>
        </br>
        <label>Zip Code: </label><?php echo $result['zipcode'];?>
        </br>
        <label>Owner: </label><?php echo $result['owner'];?>
        </br>
        <label>Phone: </label><?php echo $result['phone'];?>
        </br>
        <table border="1">
            <tbody>
                <tr>
                    <td><?php echo 'View All';?></td>
                    <td><?php echo 'Update'; ?></td> 
                    <td><?php echo 'Delete';?></td>               
                </tr>
            </tbody>
        </table>
        
        <!--<table border="1">
            <thead>
                <tr>
                    <th>
                        Company:
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php //foreach ($result as $row): ?>
                <tr>
                    <td><?php //echo $row['corp']; ?></td>
                    <td><?php //echo 'View All';?></td>
                    <td><?php //echo 'Update'; ?></td> 
                    <td><?php //echo 'Delete';?></td>               
                </tr>
               
            <?php //endforeach; ?>
            </tbody>
        </table>
        -->
        <?php else: ?>
        <h1>No Results Found</h1>
       <?php endif; ?>
    </body>
