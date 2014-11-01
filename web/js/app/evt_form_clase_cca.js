$(function() {
      
    $("#fecha").datepicker({'dateFormat':'yy-mm-dd'});  
    $( "#save" ).click(function(){
        bval = true;  
        bval = bval && $( "#idasignatura" ).required();
        bval = bval && $( "#tema" ).required();      
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});