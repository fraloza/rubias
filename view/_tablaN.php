<br>
<br>
<br>
<div class="row">
    <div style="width:100%;font-size:10px;font-weight:bold;">                
		<ul style='list-style:none;'>
				<li style='display:inline-block'>PC:Practica Calificada,</li>
				<li style='display:inline-block'>Lab:Laboratorio,</li>
				<li style='display:inline-block'>EP:Examen Parcial,</li>
				<li style='display:inline-block'>TG:Trabajo Grupal,</li>
				<li style='display:inline-block'>EF:Examen Final,</li>
				<li style='display:inline-block'>P:Promedio</li>
		</ul>
    </div>                
    <div class="col-md-10" id="aumentar">
		<div class='container-fluid' id="grande">
			<form id="formnotas" method="post">
				<table class="table table-hover table-bordered" id="ola" >
					<thead style="display:inline-block;">   
						<tr style="background-color:#eaf8fc;" > 
							<td padding="25px 20px" rowspan="2" width="160px">CODIGO</td>
							<td padding="25px 20px" rowspan="2" width="400px">NOMBRE</td>
							<?php $cont=0;foreach ($rows2 as $key => $value) { ?>
							<td padding="25px 20px" rowspan="2">
								<?php 
									$new_array=explode(' ',$value[7]);
									$acr='';
									$contad=count($new_array);
									if($contad>1){
										foreach($new_array as $key=>$val){											
											echo $val[0];
										}
									}else{
										echo substr($value[7],0,3);
									}
									//echo $value[7];
								?>
							</td>
							<?php $cont=$cont+1;}?>
							<td padding="25px 20px" rowspan="2">Promedio</td>
						</tr>
       
					</thead>
					<tbody style="width:100%; display:inline-block;overflow-y:scroll;overflow-x:hidden;height:200px">
						<?php foreach ($rows as $key => $value) { ?>
						<tr>    
							<td style="font-size:11px;"> 
								<?php echo $value[0]; $alumI=$value[0];?>
								<input type="hidden" class="codalumno" name="idalumno[]" value="<?php echo $value[0];?>"/>
							</td>
							<td style="font-size:11px;" width="170px">
								<?php echo strtoupper(utf8_encode($value[1]));?>
							</td>
							<?php 
								if (isset($rows2)){
									foreach ($rows2 as $key => $value) { ?>
										<td class="campotext<?php echo $value[3];?>" name="<?php echo $value[3];?>">
											<div class="campo<?php echo $value[3];?>"></div>
											<?php 
												foreach ($rows3 as $key => $value2) { 
													if($alumI==$value[0]){
														echo $value2[1];
													}
												}
											?>
											<div id="oli"></div>                
											<input type="hidden" class="codevento" name="idevaluacion"value="<?php echo $value[3];?>" style=""/>
											<input type="hidden" class="codcurso" value="<?php echo $value[4];?>"/>
											<input type="hidden" class="codsemestre" value="<?php echo $value[5];?>"/>
				
											<div class="editarnota<?php echo $value[3];$notita="notita".$value[3];?>"></div>           
										</td>
							<?php   }
								}else {
								
								}
							?>
							<td>Promedio</td>
						</tr>
					<?php } ?>

						<tr>
							<td colspan="11">
								<div class="button" id="enviarn">Enviar</div>
							</td>
						</tr>
					</tbody>
					<tfoot style="display: inline-block;width:100%">
						<tr>
							<td style="border:0;">
								<div class="button" id="enviarn">Enviar</div>
							</td>
						</tr>
					</tfoot>
   
				</table>
			</form>
		</div>
    </div>             
</div>
