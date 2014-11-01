
$(function() {
        
    $( "#save" ).click(function(){
        bval = true; 
        bval = bval && $( "#nombres" ).required();
        bval = bval && $( "#apellidop" ).required();
        bval = bval && $( "#apellidom" ).required();       
        bval = bval && $( "#dni" ).required();
        bval = bval && $( "#sexo" ).required();
        bval = bval && $( "#direccion" ).required();
        bval = bval && $( "#telefono" ).required();    
      
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});

