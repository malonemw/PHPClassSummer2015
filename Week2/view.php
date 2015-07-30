<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './dbConn.php';
        include './functions.php';
        ?>
        
        <form method="post" action="#">
            
            Actor's First Name <input type="text" value="" name="firstName" />
            <br />
            Actor's Last Name <input type="text" value="" name="lastName" />
            <br />
            Actor's Date of Birth <input type="date" value="" name="dob" />
            <br />
            Actor's Height <input type="int" value="" name="height" />
            <br />
            <input type="submit" value="Submit" />
            
            <?php          
            $results = '';            
            
            

            $db = getDB();

            $stmt = $db->prepare ("SELECT * FROM actors");
            

            $results = array();
            if ($stmt->execute($results) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchall(PDO::FETCH_ASSOC);   
            }
            
        ?>
        
            <table>
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Height</th>
                </tr>
            </thead>
                    
                <?php foreach($results as $row): ?>
            <table>
                <thead>
            <tr>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['dob']; ?></td>            
                    <td><?php echo $row['height']; ?></td>            
                </tr>
                <?php endforeach; ?>
            
             </table>
                

            
        </form>
    </body>
</html>
