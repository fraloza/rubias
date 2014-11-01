<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_detcom_cca.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Nuevo Docente a la Comision</h6>

<form id="frm" action="index.php" method="POST" accept-charset="UTF-8">
    <input type="hidden" name="controller" value="detalle_comision_cca" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;" >
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
           
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>
                 <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                 <tr class="fil">
                     <td>
                     <label for="iddetalle_comision">Codigo:</label>
                     </td>
                     <td>
                     <input id="iddetalle_comision" name="iddetalle_comision" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->iddetalle_comision; ?>"readonly />
                     </td>
                    
                    <td width="20%" align="left">
                     <input type="hidden" name="idcomision" value="<?php echo $_REQUEST['cod']?>">
                     <label for="comision" >Docente:</label>
                     </td>
                    <td>
                    <?php echo $docente; ?>
                    </td>
                    <td>
                        <label for="cargo_comision">Cargo:</label>
                    </td>
                    <td>
                        <select name="cargo_comision" id="cargo_comision" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;">
                                <option value="">...</option>
                                <option value="PRESIDENTE" <?php if($obj->cargo_comision=="PRESIDENTE"){echo "selected";} ?> >PRESIDENTE</option>
                                <option value="MIEMBRO2" <?php if($obj->cargo_comision=="MIEMBRO2"){echo "selected";} ?> >MIEMBRO2</option>
                        </select> 
                    </td>
                 
                </table>
       </fieldset>
      </div>

            <div style="margin:0 auto; width: 660px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=comision_cca" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
    </form>
</div>