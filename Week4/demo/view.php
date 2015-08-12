<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once './dbconnect.php';
           include_once './fucntions/dbData.php';
           
           
           $results = getAllTestData();
           $results = searchTest('dataone', 'hello');
           
            
        ?>
        
        
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['dataone']; ?></td>
                    <td><?php echo $row['datatwo']; ?></td> 
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
           
    </body>
</html>