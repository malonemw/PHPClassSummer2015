<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php
           /*
            * Table Generator
            */
           ?>
        
        <table cellspacing="0">
        <?php for($tr = 1; $tr <= 10; $tr++):?>
            <tr>
                <?php for($td = 1; $td <= 10; $td++): ?>
                <td style="background-color: <?php echo $colorHex = '#'.strtoupper(dechex(rand(0x100000, 0xFFFFFF))); ?>">
                    <?php echo $colorHex ?> 
                    <br/>
                    <span style="color: #ffffff;"> <?php echo $colorHex ?> </span>
                </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        </table>
        
    </body>
</html>
