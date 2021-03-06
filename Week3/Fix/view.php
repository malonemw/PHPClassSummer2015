<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
                
        //$id = filter_input(INPUT_GET, 'id');
        
        include './dbconnect.php';
        include './functions.php';
            
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
        <table border="1" class="table table-hover">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th></th>
                    <th></th>
                    <th><a href="dbINSERT.php"> Create New Company </a></th>              
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a class="btn btn-info" href="READ.php?id=<?php echo $row['id']; ?>"> Read </a></td>
                    <td><a href="UPDATE.php?id=<?php echo $row['id']; ?>"> Update </a></td> 
                    <td><a href="DELETE.php?id=<?php echo $row['id']; ?>"> Delete </a></td>               
                </tr>
              
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php else: ?>
        <h1>No Results Found</h1>
       <?php endif; ?>
    </body>
