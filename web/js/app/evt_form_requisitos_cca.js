$(function() {
    
    $( "#save" ).click(function(){
        bval = true;  
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#idcomision" ).required();
      
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});