<?php $i=1; ?>
<div class="pn2"></div>
<div class="effect" id="byesyllabus">

<?php foreach ($rows as $key => $value) { ?>

<div id="<?php echo $i; $i++; ?>" class="lc" style="margin-left: 0px; height:100px; width:170px;" >
        <div class="list-group" style="margin-left: 17px; width:130px; border-radius: 10px; 
                box-shadow:0px 0px 10px 0px skyblue ;" title="<?php echo utf8_encode(strtoupper($value[4])); ?>">
            
            <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')){?>
            
            <a href="#" style="font-size:10px; background-color:#eaf8fc;" class="list-group-item ">
                <?php echo utf8_encode(strtoupper($value[1])); ?>
            </a>

            <a href="#" style="font-size:10px;" class="list-group-item">
             <b>Docente:</b><?php echo (utf8_encode(strtoupper($value[2]))); ?><BR>
            </a>
             
            <?PHP }?>
            <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')){?>
         
            <a href="#" style="font-size:8.4px; background-color:#eaf8fc; " class="list-group-item ">
            
            <?php echo utf8_encode(strtoupper($value[1])); ?>
           <span class="badge" title="creditos" style="background: skyblue; margin-top:-30px; margin-right: -19px;">
             <?php $credito =(int)$value[3]; echo $credito; ?> 
           </span>  
            </a>
          
            
            

             <?php }?>
        </div> 
       
         
         <div style="margin-top:-16px;">
            <span class="list-inline" >
                <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'ALUMNO')){?>
                    
                <input  type="hidden" class="semestre" value="<?php echo $value[4]?>"/> 
                
                <input  type="hidden" class="curso" value="<?php echo $value[3]?>"/> 
                
                <a onclick="Ver('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">syllabus</a>
                 <a onclick="VerSyllabus('<?php echo $_SESSION['idusuario'];?>','<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">notas</a>

              <?php }?>
            <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 'PROFESOR')){?>

                <a onclick="Ver('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" 
                id="" name="" class="btn btn-primary btn-xs">lista</a>
                <a onclick="VerRegistro('<?php echo $value[0];?>')" style="font-size:10px; align:center; padding:2px 2px ;" 
                id="" name="" class="btn btn-primary btn-xs">registro</a>
                <a onclick="VerSi('<?php echo $value[0];?>','<?php echo $id; ?>')" style="font-size:10px; align:center; 
                padding:2px 2px ;" id="" name="" class="btn btn-primary btn-xs">sylabus</a>
                <a onclick="VerAsistencia('<?php echo $value[0];?>')" style="display:none; font-size:10px; align:center;
                 padding:2px 2px ;" title="desabilitado por el momento"  class="btn btn-primary btn-xs">asistencia</a>

             <?php }?>
            </span>
        </div>  
    </div>  

<?php  }?>
</div>
<div class="pn1" width="170px" heigth="20%" style="display: none">
</div>
<span style="cursor:pointer; margin-left:-60px;" class="glyphicon glyphicon-chevron-down sp1" ></span>
<script>
$(document).ready(function(){
  $('.sp1').click(function(){
    $('.pn1').slideToggle('slow');
  });
  tdiv= $('.lc').length;
  
  $('.lc').click(function(){
     tid= $(this).attr('id');
     for (i = 1; i <= tdiv; i++) {
         if (i==parseInt(tid)) {
            $('#'+i).appendTo('.pn2');
         }else{
            $('#'+i).appendTo('.pn1');
         }
         $('.pn1').css("display","none");
     }
  });
})
</script>