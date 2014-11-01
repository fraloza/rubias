<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_matricula_cca.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<div class="div_container">
<h6 class="ui-widget-header">Registro de Matricula</h6>

<form id="frm" action="index.php" method="POST" accept-charset="UTF-8">
    <input type="hidden" name="controller" value="matricula_cca" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;" >
        <div class="contenido" style="margin:0 auto; width: 750px; " align="center">         
            <fieldset class="ui-corner-all" >
                <legend>Datos</legend>
                <button onclick="javascript:popup('index.php?controller=alumno_cca&action=buscar_a',860,400);" type="button">BUSCAR</button><br/><br/>
                 <table border="0" cellpadding="3" cellspacing="1" style="background-color:#fff;margin-left:8%" >
                 <tr class="fil">
                     <td>
                     <label for="idmatricula">ID:</label>
                     </td>
                     <td>
                     <input id="idmatricula" name="idmatricula" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->idmatricula; ?>"readonly />
                     </td>
                     <td width="20%" align="left">
                     <label for="" >Nombre del Alumno:</label>
                     </td>
                     <td>
                        <input id="idalumno" name="idalumno" type="hidden" value="<?php echo $obj->idalumno; ?>" />   
                        <?php  $nomalumno;?>
                         <input id="nombres" name="nombres" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->nombres; ?>"  />
                     </td>
                     
                 </tr>
                    <tr class="fil">
                       <td> 
                         <strong for="apellidop" align="right" >Apellido Paterno:</strong>
                       </td> 
                       <td>
                         <input id="apellidop" name="apellidop" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->apellidop; ?>"  />           
                       </td>
                       <td align="left">
                           <strong for="apellidom"  >Apellido Materno:</strong>
                       </td>
                       <td>
                           <input id="apellidom" name="apellidom" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->apellidom; ?>"  />                
                       </td>
                     </tr>
                     <tr class="fil">
                        <td align="rigth">
                            <strong for="dni"  >DNI:</strong>
                        </td> 
                        <td>
                            <input id="dni" name="dni" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->dni; ?>"  />                
                        </td>   
                        <td align="left">
                            <strong for="sexo"  style="width: 80px">Sexo:</strong>
                        </td>
                        <td>        
                            <select name="sexo" id="sexo">
                                <option value="">...</option>
                                <option value="M" <?php if($obj->sexo=="M"){echo "selected";} ?> >MASCULINO</option>
                                <option value="F" <?php if($obj->sexo=="F"){echo "selected";} ?> >FEMENINO</option>
                            </select>      
                       </td>
                      </tr>
                 <tr>
                    <td width="20%" align="left">
                        <label for="idcomision" >Comision:</label>
                    </td>
                    <td>
                         <?php echo $comision;?>
                    </td>
                    <td width="20%" align="left">
                        <label for="nombre_proyecto">Nombre Proyecto:</label>
                    </td>
                    <td width="30%">
                        <input id="nombre_proyecto" name="nombre_proyecto" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->nombre_proyecto; ?>" />                  
                    </td>
                 </tr>
                 <tr>
                     <td align="left" colspan="4">
                        <label for="idcomision" >Asiganturas:</label>
                    </td>
                 </tr>
                 <tr>
                     <td align="left" colspan="4">
                        <?php echo $asignatura; ?>
                    </td>
                 </tr>
                 <tr>
                    <td>
                        <label for="fecha">Fecha:</label>
                    </td> 
                    <td width="30%" >
                        <input id="fecha" name="fecha" class="text ui-widget-content ui-corner-all" style=" width: 150px; text-align: left;" value="<?php echo $obj->fecha; ?>" />   
                    </td>
                 </tr> 
                 
                </table>
       </fieldset>
      </div>

            <div style="margin:0 auto; width: 660px; height: 70px;">
            <fieldset class="ui-corner-all" >
            <legend>Accion</legend>
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="save" class="button">GRABAR</a>
                    <a href="index.php?controller=matricula_cca" class="button">ATRAS</a>
                </div>
                </fieldset>
                </div>
        </div>
    </form>
</div>