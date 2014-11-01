<!--Partes del  silabo-->
<style>
    .nav a{
        color:#428bca; 
    }
    .fila-base{ display: none; } /* fila base oculta */
    .eliminar{ cursor: pointer; color: green; }


#tabla input[type='text']{
  margin: 0px;
  border: none;

}
#tabla td{
  padding: 0px;


}
#tabla tbody tr{
  height: 30px;
}
#tabla input[type='number']{
  width: 100%;
}

</style>
<!--ALUMNO Comienza-->

<?php if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')) { ?>
    <link rel="stylesheet" href="../web/css/css.css">
    <!--INICIO foreach-->
    <div id="ampliar">
    <ul class="nav nav-tabs" id="myTab" >
        <li class="active"><a href="#obGen" data-toggle="tab" class="ecp" >Objetivos Generales</a></li>
        <li><a href="#unidad" data-toggle="tab" class="unidad" class="ecp">Unidad</a></li>
        <li><a href="#bibliografia" data-toggle="tab" class="ecp">Bibliografia</a></li>
    </ul> 
    </div>
    <?php
   if($rows){
    foreach ($rows as $key => $value) { ?>

        <div class="tab-content col-md-11">
            <div class="tab-pane active" id="obGen" align="justify">
            <br>
             <table class="table table-hover table-bordered">
                <tbody>
                   <tr>
                       <td><label>competencia</label>
                       <?php echo $value[0] ?>
                       </td>
                       <td>
                         <label>metodologia</label>
                         <?php echo $value[1] ?>
                       </td>
                   </tr>
                   <tr>
                       <td>
                         <label>objetivo</label>
                         <?php echo $value[2] ?>
                       </td>
                       <td>
                        <label>sumilla</label>
                        <?php echo $value[3] ?>
                       </td>
                   </tr>
                </tbody>
            </table>
            </div>

        <input type="hidden" id="semestre" value="<?php echo $value[4] ?>"/>
        <input type="hidden" id="curso" value="<?php echo $value[5] ?>"/>
<!--        unidad inicio-->
        <div class="tab-pane"  id="unidad" align="justify">
            <div id="unidades"></div>
        </div>
<!--        unidad fin-->
        <div class="tab-pane" id="bibliografia">
            <input  type="hidden" id="curs" value="<?php echo $value[5] ;?>"/>
            <input type="hidden" id="semes" value="<?php echo $value[4] ; ?>">

            <table id="bibl" class='table table-hover table-bordered'>
            <thead>
            <tr style='background-color:#EAF8FC;font-size:12px;text-transform:uppercase;color:#000'>
            <th>tipo de bibliografía</th>
            <th>Descripción</th>
            <th></th>
            </tr>
            </thead>

            <tbody>
              <tr class="dtp">
                <td> 
                <?php 
                mysql_connect("localhost", "root", "");
                mysql_select_db("sisacreditacion");
                $consulta=mysql_query("SELECT descripcion_tipobibliografia from tipo_bibliografia ");
                echo "<select  name='tipbibl[]' style='width:65%;' class='form-control dts'>";
                echo "<option value='0'>Elige</option>";
                  while($registro=mysql_fetch_row($consulta)){
                    echo "<option value='".$registro[0]."'>".$registro[0]."</option>";
                  }
                echo "</select>";   
                echo '<br/>'; 
               ?> 
                </td>
                <td><input type='text' id='descripcion' name='descripcion[]' 
                  class='text ui-widget-content ui-corner-all' rows='3' cols='40' style='width: 100%; 
                  text-align: left;' placeholder='Ingresar Descripción'/>
                </td>
                <td class="eliminar">
                  <button type="button" class="btn btn-default " >
                    <span class="glyphicon glyphicon-remove"></span>
                  </button>
                </td>
              </tr>
            </tbody>
           </table>            
            <?php foreach ($rows4 as $key => $value) {?>
                    <?php echo $value[0];?>
                <?php }?>
    
        </div>
         <br>
        </div>
<!--        edit fin-->


        <?php }
        }else{

            

         ?>
<form id="frm1" action="index.php?controller=cursosemestre" method="POST">
<input type="hidden" name="controller" value="cursosemestre" />
    <input type="hidden" name="action" value="save" />
    <input type="hidden" name="codemestre" value="<?php echo $_POST["codemestre"]; ?>" >
    <input type="hidden" name="codcurso" value="<?php echo $_POST["Codigo"]; ?>" >
    <input type="hidden" name="coddocente" value="<?php echo $_SESSION['idusuario']; ?>" >
<div class="tab-content col-md-11">
        <div class="tab-pane active" id="obGen" align="justify">
            <br>

            <table class="table">
                <tbody>
                   <tr>
                       <td><label>competencia</label>
                       <textarea id="competencia_1" class="form-control" name="competencia" required rows="3"> </textarea>
                       </td>
                       <td>
                         <label>metodologia</label>
                         <textarea id="metodologia_1" class="form-control" name="metodologia" rows="3"> </textarea>
                       </td>
                   </tr>
                   <tr>
                       <td>
                         <label>objetivo</label>
                         <textarea id="objetivo_1" class="form-control" name="objetivo" rows="3"></textarea>
                       </td>
                       <td>
                        <label>sumilla</label>
                        <textarea id="sumilla_1" class="form-control" name="sumilla" rows="3"></textarea>
                       </td>
                   </tr>
                </tbody>
            </table>
    </div>  
             
        <div class="tab-pane"  id="unidad" align="justify" >
            <br>
            <button type="button" style="margin-left:40%;" onclick="agregarUni()" class="btn btn-default">
            Agregar</button>
            <br>
            <table id="tabla" class='table table-hover table-bordered'>
                <!-- Cabecera de la tabla -->
                <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Competencia</th>
                      <th>Duración</th>
                      <th>porcentaje</th>
                      <th>Temas</th>
                  </tr>
                </thead>
               
                <!-- Cuerpo de la tabla con los campos -->
                <tbody>
                <tr class="el" style="display:none;">
                  <td></td>
                  <td><input type='text' class='form-control' name='descripcion[]'  /></td>
                  <td><input type='text' class='form-control' name='competencia[]' /></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class='eliminar'>
                       <button type='button' class='btn btn-default' >
                          <span class="glyphicon glyphicon-remove"></span>
                       </button>
                   </td>
                 </tr>
                </tbody>
                 
            </table>
            <br>
            <div id="a"></div>

           


        </div>
        <div class="tab-pane" id="bibliografia">

        <button id="biblio" type="button" class="btn btn-default" onClick="bib()">Agregar</button> <br>
 
        <div >
          <table id="bibl" class='table table-hover table-bordered'>
            
            <thead>
            <tr style='background-color:#EAF8FC;font-size:12px;text-transform:uppercase;color:#000'>
            <th>tipo de bibliografía</th>
            <th>Descripción</th>
            <th></th>
            </tr>
            </thead>

            <tbody>
              <tr style="display:none" class="dtp">
                <td> 
                <?php 
                mysql_connect("localhost", "root", "");
                mysql_select_db("sisacreditacion");
                $consulta=mysql_query("SELECT descripcion_tipobibliografia from tipo_bibliografia ");
                echo "<select  name='tipbibl[]' style='width:65%; display:;' class='form-control dts'>";
                echo "<option value='0'>Elige</option>";
                  while($registro=mysql_fetch_row($consulta)){
                    echo "<option value='".$registro[0]."'>".$registro[0]."</option>";
                  }
                echo "</select>";   
                echo '<br/>'; 
               ?> 
                </td>
                <td><input type='text' id='descripcion' name='descripcion[]' 
                  class='text ui-widget-content ui-corner-all' rows='3' cols='40' style='width: 100%; 
                  text-align: left;' placeholder='Ingresar Descripción'/>
                </td>
                <td class="eliminar">
                  <button type="button" class="btn btn-default " >
                    <span class="glyphicon glyphicon-remove"></span>
                  </button>
                </td>
              </tr>
            </tbody>
           </table>


        </div> 
    
        </div>
</div>


      <input type="submit" id="grabar_1" class="btn btn-info" value="Grabar Silabus">

</form>

<?php }

        ?> 

    <?php } ?>

