<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
         
    });    
    function get(p1,p2,p3,p4,p5,p6)
    {   
         opener.document.getElementById("idalumno").value=p1;
         opener.document.getElementById("nombres").value=p2;
         opener.document.getElementById("apellidop").value=p3;
         opener.document.getElementById("apellidom").value=p4;
         opener.document.getElementById("dni").value=p5;
         opener.document.getElementById("sexo").value=p6;
         window.close();

    }
    
</script>
<div class="div_container" >
    <h6 class="ui-widget-header">BUSQUEDA DE ALUMMNOS</h6>
<?php  echo $grilla; ?>
</div>