<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_asignatura_cca.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Registro de asignaturas CCA</h6>

<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="asignatura_cca" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>  
               <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;" >
                   <tr class="fil">
                      <td width="20%" align="left">
                        <span for="idasignatura" ><strong>ID:</strong></label>
                      </td>
                      <td width="30%">
                        <input id="idasignatura" name="idasignatura" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idasignatura; ?>" readonly />                
                      </td>
                      <td width="20%" align="left">
                         <strong for="descripcion" >Nombres:</strong>
                      </td>  
                      <td width="30%" >
                         <input id="descripcion" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->descripcion; ?>"  />                
                      </td>
                    </tr>
                    <tr class="fil">
                       <input type="hidden" name="idcomision" value="<?php $_REQUEST['cod']?>">
                       <td align="left">
                           <strong for="iddocente"  >Docente:</strong>
                       </td>
                       <td>
                         <?php echo $docente;?>
                    </td>
                    </tr>              
                                          
                      <tr class="fil">
                            <td> 
                               <strong for="creditaje" class="labels" style="width: 130px;">Creditaje:</strong>
                            </td>
                            <td>
                                <input id="creditaje" name="creditaje" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->creditaje; ?>"  />                
                            </td>
                            
                      </tr>
               </table>
                </fieldset>
                </div>
            
             <div class="contenido" style="margin:0 auto; width: 750px; " align="center">
             <fieldset class="ui-corner-all" >
                <legend>Accion</legend> 
                 <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=asignatura_cca" class="button">ATRAS</a>
                 </div>   
              </fieldset>
              </div>
        </div>
    </div>
</form>
