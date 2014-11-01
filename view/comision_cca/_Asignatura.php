<h4 align="center">LISTA DE ASIGNATURAS</h4>
<button onclick="irasignatura()" class="button">NUEVA</button>
    <ul style="list-style: none;">
        <?php
        foreach ($asignaturas as $value){?>
            <li
                align="center" 
                style="
                color: blue;
                font-family: arial;
                ">
                <?php echo $value[0]?>---><?php echo $value[1]?>
            </li>
            <br>
    
        <?php } ?>
    </ul>

