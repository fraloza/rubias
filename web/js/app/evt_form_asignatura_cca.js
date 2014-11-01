$(function() {
    
    $( "#save" ).click(function(){
        bval = true;         
        bval = bval && $( "#descripcion" ).required();; 
        bval = bval && $( "#iddocente" ).required(); 
        bval = bval && $( "#creditaje" ).required(); 
               
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});