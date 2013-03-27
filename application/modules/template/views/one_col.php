<!DOCTYPE html> 
<html>   

    <body>      
         
    </body>  
</html>



<html>
    <head>      
        <meta charset="utf-8">      
        <title>With Bootstrap</title>      
        <link rel="stylesheet" href="<?php echo Modules::run('twitter_bootstrap/get_css_url', "bootstrap.min.css"); ?>">   
    </head>    
    <body style="background-color: red;">
  <p>Hello Bootstrap!</p>      
        
        
        <table width="900" allign="center" border="1" style="background-color: yellow;">
            <tr><td align="center" valign="center"><h1>One Col Layout</h1></td></tr>

            <tr>
                <td height="500" valign="top">

                    <?php
                    $this->load->view($module . '/' . $view_file);
                    ?>
                </td>     
            </tr>
        </table>

        <!-- The scripts are loaded in the bottom of the page for faster render times -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>      
        <script src="<?php echo Modules::run('twitter_bootstrap/get_css_url', "bootstrap.min.js"); ?>"></script>
    </body>


</html>