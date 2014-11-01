
$(function() {
    $("#fecha").datepicker({'dateFormat':'yy-mm-dd'});
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#idalumno" ).required();
        bval = bval && $( "#idcomision" ).required();
        bval = bval && $( "#nombre_proyecto").required();
        bval = bval && $( "#fecha").required();
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});

