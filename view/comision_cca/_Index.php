<?php  include("../lib/functions.php"); ?>
<script type="text/javascript" src="js/app/evt_form_comision_cca.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Comisiones CCA Registradas</h6>
<div class="col-md-6">
<?php
echo $lista;
?>
</div>
<div class="col-md-6" id="miembro">
    <table boder="1"><tr><td>
    <ul style="list-style: none;">

    </ul>
    </td></tr></table>
</div> 
<div class="col-md-6" id="asignatura">
    <ul style="list-style: none;" id="lis_asignatura">

    </ul>
</div> 
</div>
