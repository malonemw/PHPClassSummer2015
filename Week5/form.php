<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include './functions/dbconnect.php';
            include './functions/until.php';
            
            $url = "";
            $textvalue = "";
            
                $db = dbconnect();
                    $stmt = $db->prepare("SELECT * FROM sites ORDER BY site_id ASC");
             ?>
            

        
        <form method="post" action="#">
 
            Enter Site URL: <input type="text" name="url" value="<?php echo $textvalue?>" />
            
            <input type="submit" value="Submit" />
        </form>
        
        <!-- add if statement for error check -->
        <?php
           if (isPostRequest()){
            
            $url = filter_input (INPUT_POST, 'url');
           
           if ( filter_var($url, FILTER_VALIDATE_URL) !== false  ): ?>
            <h2>Site URL is valid</h2>
        <?php else: ?>
            <h2>Site URL is NOT valid</h2>
        <?php endif; ?>
                   
            
            <!--check if in database-->
        <?php if ($url === $binds['site']){
            echo "Site is already in Database";
            
        }
        else {
            
         //run curl to grab any links off html text of site-->
         $curl = curl_init(); 
        // set url 
        curl_setopt($curl, CURLOPT_URL, $url); 
        //return the transfer as a string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $curlLinkOutput = curl_exec($curl); 
        
        // close curl resource to free up system resources 
        curl_close($curl);
        ?>
            
            <!-- input curl data into links table-->
        <?php    
        $htmlRegex = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
            
            $text = $curlLinkOutput;        
            preg_match_all($htmlRegex, $text, $linkMatches);
            $removeDuplicates = array_unique($emailMatches[0]);
          
            
          //add site into table  
            $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = NOW()");
            $binds = array(
                ":site" => $url                 
             );
            
            $result = 'Site Table was not updated';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                 $result = 'Site Table has been updated';
            }
        
        
        // add links into table
                       
            $stmt = $db->prepare("INSERT INTO sitelinks SET link = :link, site_id = :site_id");
            foreach ($foundlinks as $link) {
                        $binds = array( ":link" => $link, ":site_id" => $site_id); 
                        $stmt->execute($binds);     
            }
            
            
            
            $result = 'Link Table was not updated';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                 $result = 'Link Table has been updated';
            }
        }
        
       //first post request 
        }
        ?>
   
    </body>
</html>