<h4 align="center">LISTA DE MIEMBROS</h4>
<button onclick="ircomision()" class="button">NUEVA</button>
    <ul style="list-style: none;">
        <?php
        foreach ($miembros as $value){?>
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

