<?php
    include("../lib/functions.php");
?>
<script type="text/javascript" src="js/app/evt_form_perfil.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Registro de Perfil</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Perfil" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 660px; ">
                
                <label for="idperfil" class="labels">Codigo:</label>
                <input id="idperfil" name="idperfil" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idperfil; ?>" readonly />
                <label for="descripcion" class="labels">Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
                <br>
                <label for="estado" class="labels">Activo:</label>
                <?php                   
                    if($obj->estado==true || $obj->estado==false)
                            {
                             if($obj->estado==true){$rep=1;}
                                else {$rep=0;}
                            }
                     else {$rep = 1;}                    
                     activo('activo',$rep);
                ?>
                    
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=Perfil" class="button">ATRAS</a>
                </div>
        </div>
    </div>
</form>
</div>