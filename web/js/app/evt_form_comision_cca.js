$(function() {
    
    $( "#comision" ).focus();   
    $("#fecha_inicio").datepicker({'dateFormat':'yy-mm-dd'});  
    $("#fecha_termino").datepicker({'dateFormat':'yy-mm-dd'}); 
    $( "#descripcion").focus();
    $( "#save" ).click(function(){
        bval = true;  
        bval = bval && $( "#comision" ).required();
        bval = bval && $( "#fecha_inicio" ).required();
        bval = bval && $( "#fecha_termino" ).required();
        bval = bval && $( "#descripcion" ).required();
      
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });
    
    $(".asig").click(function(){
        var id=$(this).attr("name");
        document.getElementById("cod").value=id;
//        alert(id);
        $.get('index.php', 'controller=comision_cca&action=Mostrar_miembros&id=' + id, function(data) { 
//            alert(serialize(data));
           $("#miembro").empty();
             $("#miembro").append(data);
             $("#asignatura").empty();
        });
        
    });
    
    
    $(".vera").click(function(){
        var id=$(this).attr("name");
        document.getElementById("cod").value=id;
        $.get('index.php', 'controller=comision_cca&action=Mostrar_asignaturas&id=' + id, function(data) { 
//            alert(serialize(data));
           $("#asignatura").empty();
             $("#asignatura").append(data);
             $("#miembro").empty();
        });
        
    });
      
});
function ircomision(){
        var x=document.getElementById("cod").value;
        window.location.assign("?controller=detalle_comision_cca&action=create&cod="+x);        
    } 
function irasignatura(){
        var x=document.getElementById("cod").value;
        window.location.assign("?controller=asignatura_cca&action=create&cod="+x);        
    } 