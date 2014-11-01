$(function() {
    
    $( "#save" ).click(function(){
        bval = true;  
        bval = bval && $( "#idcomision" ).required();
        bval = bval && $( "#iddocente" ).required();
      
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});