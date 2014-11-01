    <h4>LISTA DE COMISIONES</h4>
    <a href="index.php?controller=comision_cca&action=create" class="button">NUEVA</a><br><br>
    <ul style="list-style: none;">
        <table border="1" >
            <tr>
            <td width="500">
            <?php
            foreach ($rows as $value){?>
                <li align="center" 
                    style="
                    color: blue;
                    font-family: arial;    
                ">
                    <?php echo $value[1]?>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $value[3]?> &nbsp / &nbsp <?php echo $value[4]?>
                </li>
                    <input type="hidden" id="cod" value="<?php echo $value[0]?>">
                    <a class='asig' name='<?php echo $value[0]?>' value=""><img alt='' src='images/accept.png' /></a>&nbsp
                    <a class='vera' name='<?php echo $value[0]?>' value=""><img alt='' src='images/cursos.png' /></a>&nbsp
                    <a href="index.php?controller=comision_cca&action=edit&id=<?php echo $value[0]?>"><img alt='' src='images/edit.png' /></a>
                   <br><br>
            <?php } ?>
            </td>
            </tr>
        </table>
    </ul>

