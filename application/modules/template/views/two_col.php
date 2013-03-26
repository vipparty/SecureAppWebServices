<html>
    <head></head>
    <body style="background-color: blue;">
        
        <table width="900" allign="center" border="1" style="background-color: yellow;">
            <tr>
                <td align="center" valign="center" colspan="2" style="background-color: cyan">
                        <h1>Two Col Layout</h1>
                </td>
            </tr>
            
            <tr>
                <td height="200" valign="top">Left Nav here</td>
                
                <td height="500" valign="top">
                    <?php
                        $this->load->view($module.'/'.$view_file);
                    ?>
                </td>     
            </tr>
        </table>
        
    </body>
    
    
</html>