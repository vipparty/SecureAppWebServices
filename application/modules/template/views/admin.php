<html>
    <head></head>
    <body style="background-color: whitesmoke;">
        
        <table width="900" allign="center" border="1" style="background-color: yellow;">
            <tr><td align="center" valign="center"><h1>One Col Layout</h1></td></tr>
            
            <tr>
                <td height="500" valign="top">
                   <?php
                        $this->load->view($module.'/'.$view_file);
                    ?>
                </td>     
            </tr>
        </table>
        
    </body>
    
    
</html>