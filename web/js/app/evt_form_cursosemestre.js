//cursos q enseña el docente
$(function() {
    
$( "#tabs" ).tabs();


    $("#generar_u").click(function(){
          var num= $("#nuni").val();


         //$("#unidd").dialog("open");
    });

//modal de evaluacion
    $( "#dialog" ).dialog({
        autoOpen: false,
        show: {
          effect: "blind",
          duration: 200
        },
        hide: {
          effect: "explode",
          duration: 300
        },
        buttons: {
          "Grabar": function() {
            $( this ).dialog( "close" );
          },
          Cancel: function() {
            $( this ).dialog( "close" );
          }
        }
         
      });



    $('#grabar_1').click(function() {

      $("#frm1").submit();
    
        if ( $('#competencia_1').val() == " " ) {
            alert("llenar competencia");
        }else{
        if ( $('#metodologia_1').val() == " " ) {
            alert("llenar metodologia");
        }else{
           if ( $('#objetivo_1').val() == "" ) {
            alert("llenar objetivo");
        }else{
        if ( $('#sumilla_1').val() == "" ) {
            alert("llenar sumilla");
        }else{
           if ( $('#bibliografia_1').val() == "" ) {
            alert("llenar bibliografia");
        }
        }
      }
       
        }

      }
       
    });



    $(".datepicker").datepicker();
    //var vars = $("#semestreacademico").val();
 
    

    $("#semestreacademico").change(function() {
      var idsa = $(this).val();
      carga(idsa);
      //alert(idsa);  
    });
    carga($("#semestreacademico").val());
    //alert("me recargue");
// fin cursos q enseña el docente
});
/*
  function cambiarfoto(){
    $( "#dialog" ).dialog( "open" );
  }*/
var ii=2;

function agregarUni(){
    h1 = "<input type='number' class='form-control' id='duracion"+ii+"' name='duracion[]'/>";
    h2 = "<button type='button' class='btn btn-default' onClick='semana("+ii+")'>+</button>";
    h3 = "<input type='text' id='porcentaje' class='form-control' name='porcentaje[]' placeholder='%'/>";
    h4 = "<div id='h"+ii+"'></div>"; 
    h5 = "<input type='text' id='nombreunidad"+ii+"' class='form-control' name='nombreuni[]' />";

   $("#tabla tbody tr:eq(0)").clone(".el").css("display","").removeClass("el").appendTo("#tabla tbody");
   $(h5).appendTo("#tabla tbody tr:nth-child("+ii+") td:nth-child(1)");
   $(h1).appendTo("#tabla tbody tr:nth-child("+ii+") td:nth-child(4)");
   $(h3).appendTo("#tabla tbody tr:nth-child("+ii+") td:nth-child(5)");
   $(h2).appendTo("#tabla tbody tr:nth-child("+ii+") td:nth-child(6)");
   $(h4).appendTo("#a");
   ii++;
}
function validarLetras(e)
{
  tecla=(document.all) ? e.keyCode : e.which;
  if(tecla==8) return true; // backspace
  if(tecla==32) return true; // espacio
  if(tecla==9) return true; // tab
  if(tecla==37) return true; // flecha izquierda
  if(tecla==38) return true; // fleach arriba
  if(tecla==39) return true; // flecha derecha
  if(tecla==40) return true; // flecha abajo
  if(e.ctrlkey && tecla==86){ return true;}// Ctrl v
  if(e.ctrlkey && tecla==67){ return true;}// Ctrl c
  if(e.ctrlkey && tecla==88){ return true;}// Ctrl x  
  patron=/[a-zA-Z]/;
  te=String.fromCharCode(tecla);
  return patron.test(te);
}
function validarNumero(e)
{
  tecla=(document.all) ? e.keyCode : e.which;
  if(tecla==8) return true; // backspace
  if(tecla==32) return true; // espacio
  if(tecla==9) return true; // tab
  if(e.ctrlkey && tecla==86){ return true;}// Ctrl v
  if(e.ctrlkey && tecla==67){ return true;}// Ctrl c
  if(e.ctrlkey && tecla==88){ return true;}// Ctrl x  
  patron=/[0-9]/;
  te=String.fromCharCode(tecla);
  return patron.test(te);
}


 $( "#abrir" ).click(function() {
      runEffect(100,280,185,1);
      
    });
    $( ".cerrar" ).click(function() {
      runEffect(0,200,60,0);
    });

function runEffect($a,$b,$c,$d) {
       var selectedEffect = "slide";
       var options = {};
      if ( selectedEffect === "scale" ) {
        options = { percent: $a };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: $b, height: $c } };
      }

      if ($d==1){
        $( ".effect" ).show( selectedEffect, options, 500);
      }else{
        $( ".effect" ).hide( selectedEffect, options, 1000 );
      }
}
var i=2;
function bib(){
      $("#bibl tbody tr:eq(0)").clone("#bibl").removeClass("dtp").appendTo("#bibl tbody").css("display","");
//      $(".dts").clone().appendTo("#bibl tbody tr:nth-child("+i+") td:nth-child(2)").css("display","").removeClass("dts");
      i++;
}
$(".eliminar").click(function(){
    var parent = $(this).parent();
    //alert(parent);
    $(parent).remove();
    
});



var temp= [];
var temp2= [];
 j=0;
 t=  0;      
function semana(i){
  //alert("entre");
   var html="";
    
    temp[i] = $("#duracion"+i).val();
    temp2[i] = $("#nombreunidad"+i).val();
    t= t + parseInt(temp[i]);
    //alert(t);
            html +="<table class='table table-hover table-bordered'>";
            html +="<thead>";
            html +="<tr>";            
            html +="<th colspan='6'>";
            html +="<h3>unidad: "+(parseInt(i)-1)+" "+temp2[i]+"<h3>";
            html +="</th>";
            html +="</tr>";
            html +="<tr>";
            html +="<th>";
            html +="<td>Contenido</td>";
            html +="<td>Conceptual</td>";
            html +="<td>Procedimental</td>";
            html +="<td>Actitudinal</td>";
           // html +="<td>Clase</td>";
            html +="</th>";
            html +="</tr>";
            html +="</thead>";    
      
      html +="<tbody>";
        for(k=j+1;k<=t ;k++){
            html +="<tr>";
            html += "<td> semana "+k+"</td>";
            html +="<td><input type='text' id='contenido' class='form-control' rows='2' cols='30' name='cont"+k+"-"+i+"' /></td>"; 
            html +="<td><input type='text' id='Conceptual' class='form-control' rows='5' cols='30'' name='conce"+k+"-"+i+"'/></td>";  
            html +="<td><input type='text' id='procedimental' class='form-control' rows='5' cols='30' name='proc"+k+"-"+i+"' /></td>";  
            html +="<td><input type='text' id='actitudinal'  class='form-control' rows='5' cols='30' name='act"+k+"-"+i+"' /></td>";
           // html += "<td><button type='button' class='btn btn-default' onClick='clase("+i+")'>+</button></td> ";
            html  +="</tr>";
           j++;
    }
    html += "<tr><table id='ta' class='table table-hover table-bordered'>";
    html += "<thead>";
            html += "<tr>";
            html += "<th>tipo</th>";
            html += "<th>Descripción</th>";
            html += "<th>Fecha</th>";
            html += "<th>Ponderado</th>";
            html += "</tr>";
            html += "</thead>";
            html += "<tbody>";
            html += "<td></td>";
            html += "<td><input type='text' id='Descripcion' class='form-control'   /></td>";
            html += "<td><input type='date' id='fecha' class='form-control' /></td>";
            html += "<td><input type='text' id='ponderado' class='form-control' placeholder='%'' /></td>";
            html += "</tbody>";
            html += "</table> </tr>";
    html +="</tbody>";
    html +="</table>";
    $("#h"+i).html(html);
}

function llenartemas(param){
    var temp = $("#duracion"+param).val();
    var html="";
        html=html = html+"<div id='tabs_1_1'>";
        html = html+"<ul>";
        for(i=1;i<=temp;i++) {
        html = html+"<li><a href='#tabsx-"+i+"'>TEMA "+i+"</a></li>";
        }
        html = html+"</ul>";
        for(i=1;i<=temp;i++){
            html = html+"<div id='tabsx-"+i+"'>";
            html = html+"<textarea rows='10'></textarea>"; 
            html = html+"</div>";
        }
        html = html+"<div>";      
        $("#tabsxx").html(html);
        $( "#tabs_1_1" ).tabs();

       $("#tabsxx").dialog("open");
}

function carga(vars){
     //$("#idsemeestreacademicoescondido").attr('value',vars);
     
     $("#silabus").css("display", "none");
        //var ids = $(this).val();
        //console.log(ids);
        $("#tablaevaluaciones").css("display", "none");
        $("#silaedit").css("display", "");
        $("#borrarb").css("display", "none");
        $.post('index.php', 'controller=cursosemestre&action=getCursosD&CodigoSemestre=' + vars, function(data) {
            //console.log(data);
//           $("#boton").css("display", "none");
            $("#lista").css("display", "none");
//            $("#boton").css("display", "none");
            $("#tablaevaluaciones").css("display", "none");
             $("#silaedit").css("display", "");
            $("#cursodocente").empty().append(data);
            $("#accordion").css("display", "none");
        });
}

// lista de alumnos de cursos q enseña el docente  ->>>boton lista
function Ver(id) {
    var idsemestre = $("#semestreacademico").attr("value");
    var opt="A";
    console.log(id);
    $(".olassss").css("display", "none");
    $("#tablaevaluaciones").css("display", "none");
    $("#borrarb").css("display", "none");
    $("#silaedit").css("display", "none");
    $.post('index.php', 'controller=cursosemestre&action=getListaA&idcurso='+id+'&idSemestre=' + idsemestre+'&opcion='+opt, function(data) {
        
        $("#sillabus").css("display", "none");
//        $("#boton").css("display", "none");

        $("#accordion").css("display", "none");
        $("#silaedit").css("display", "none");
        $("#lista").css("display", "inline");
        $("#lista").empty().append(data);
    });
}

//  fin lista de alumnos de cursos q enseña el docente--->>boton registro  notas de cada envento
function VerRegistro(id) {
    var idsemestre = $("#semestreacademico").attr("value");
//$("#tablaevaluaciones").css("display", "");
//$("#borrarb").css("display", "");
$("#evaluaciones").css("display", "");
$("#silaedit").css("display", "none");

    $.post('index.php', 'controller=cursosemestre&action=getSillabysD&Codigo=' + id + '&idSemestre=' + idsemestre, function(data) {
        $("#accordion").css("display", "none");
        $("#lista").css("display", "none");
        //$("#evaluaciones").css("display", "");
        $("#silaedit").css("display", "none");
        $("#boton").css("display", "none");
        $("#evaluaciones").empty().append(data);
        $("#regresar").css("display", "none");
    });

      $.post('index.php', 'controller=cursosemestre&action=getListaA2&Codigo=' + id + '&idSemestre=' + idsemestre, function(data) {
            $(".olassss").empty().append(data);
            $("#silaedit").css("display", "none");
     });
     $("#silaedit").css("display", "none");
     $(".olassss").css("display", "");
     
//      $.post('index.php', 'controller=cursosemestre&action=getNcurso&Codigo=' + id , function(data) {
//           
//          $(".ncurso").empty().append(data);
//     });
        
}



$("#regresar").live("click", function() {
    $("#chau").css("display", "");
    $("#boton").css("display", "none");
    $("#agrandar").attr({
        'class': 'col-md-8'
    });
     
        
         $("#ola").css({
            'width':'500px'
        });
        
        $("#ola").css({
            'height':'60px'
        });
        
         $("#grande").css({
            'height':'270px'
        });
         $("#grande").css({
            'width':'635px'
        });
        
        $(".nota").remove();
        
    $("#borrarb").css("display", "none");
});


//boton del mostrar el siabus  y editar


function VerSi(id,codigosemestre) {
    var codemestre = codigosemestre;
//alert (id+'**'+codemestre);

$("#boton").css("display", "none");
//olassss
$("#borrarb").css("display", "none");
$(".olassss").css("display", "none");
$("#tablaevaluaciones").css("display", "none");
//$("#silaedit").css("display","inline");
$.post('index.php', 'controller=cursosemestre&action=getEdiSillabus&Codigo=' + id + '&codemestre=' + codemestre, function(data) {
//       
//        $("#evaluaciones").css("display", "inline");
//alert(data);
  $("#tablaevaluaciones").css("display", "none");
 $("#accordion").css("display", "none");
 $("#boton").css("display", "none");
 $("#lista").css("display", "none");    
 $("#silaedit").css("display", "inline"); 
 $("#silaedit").empty().append(data);
 $(".regresar").css("display", "none");
 });
 
}

$(".unidad").live("click", function() {
    var semestre = $("#semestre").attr("value");
    var curso = $("#curso").attr("value");
    var opt="asd";

    //alert(semestre+"-"+curso+"-"+opt);
//        
//        var d=semestre+' '+curso;
//        alert (d);
            $("#boton").css("display", "none");
                
    $.post('index.php', 'controller=cursosemestre&action=getUnidad&CodigoCurso=' + curso + '&idSemestre=' + semestre+'&sin='+opt, function(data) {
      if(data=="")
      {
        alert("estoi vacio");
      }else{
        $("#boton").css("display", "none");
        $("#unidades").empty().append(data);
      }

        
    });

});

function temasdUnidad(id){
    
    var codunidad=$("#idunidad").attr("value");
    //    console.log(codunidad);
var opt='B';
$.post('index.php', 'controller=cursosemestre&action=getTema&Codigo=' +id+'&option='+opt, function(data) {
$("#boton").css("display", "none");
        $(".tema").empty().append(data);
    });
};





$("#unid").live("click", function() {
    var semestre = $("#semestre").attr("value");
    var curso = $("#curso").attr("value");
    var sin='S';
      
$(".recibS").css("display","none");
$(".recibU").css("display","none");
$(".recibT").css("display","none");
$("#chau").css("display","none");
$(".regresar").css("display","");

    $.post('index.php', 'controller=cursosemestre&action=getUnidad&CodigoCurso=' + curso + '&idSemestre=' + semestre+ '&sin='+sin, function(data) {
//$("#boton").css("display", "none");
        $("#uni").empty().append(data);
    });

});



$("#vertema").live("click",function(){
    var codunidad=$("#codunidad").attr("value");
    var opt='A';
    
$(".regresar").css("display","");

$.post('index.php', 'controller=cursosemestre&action=getTema&Codigo=' + codunidad+'&option='+opt , function(data) {

        $("#tema").empty().append(data);
    });
});



$(".editar").live("click",function(){
            $("#boton").css("display", "");

});



function filtro (id){
   
     var alumno=$(".codalumno").attr("value");
     var enviar2=".enviar"+id;
     var td=".campotext"+id;
    var idcampo=$(td).attr("name");
    var evento='.campo'+id;
    var editarnota =".editarnota"+id;

     $("#accordion").css("display", "");
        $("#chau").css("display", "none");
        $("#borrarb").css("display", "");
        $("#regresar").css("display", "");
            $("#boton").css("display", "none");
        $("#agrandar").attr({
            'class': 'col-md-11 col-md-offset-1'
        });
        
        $("#ola").css({
            'width':'830px'
        });
        $("#aumentar").css({
            'class':'col-md-12' ,"width" :"93%"
        });
        
         $("#ola").css({
            'height':'300px'
        });
         $("#grande").css({
            'height':'300px'
        });
         $("#grande").css({
            'width':'850px'
        });
        $(editarnota).css("display","none");
        $("#lista").css("display", "none");
        $(".insertar").css("display", "");
    if(id !== idcampo || id === idcampo ){
//        $(evento).css("display","");

             $(evento).html("<input  type='text' maxlength='2'  size='1px' class='nota' name='notas[]' pattern='{0-9}+'/><br>\n\
                                ");
              $(enviar2).css("display","");
}
else{
$(evento).css("display","none");
 
}
    
}








  
  $("#enviarn").live("click",function(){
    
    var alumno =$('input[name="idalumno[]"]').serialize();
    var nota=$('input[name="notas[]"]').serialize();
    var evaluacion=$(".codevento").attr("value");
//    var codalumno=$(".codalumno").val();
        var campo=".campotext"+evaluacion;
    var editarnota=".editarnota"+evaluacion;
    var notita=".notita"+evaluacion;
    
    var codcurso=$(".codcurso").attr("value");
        var codsemestre=$(".codsemestre").attr("value");

//    alert (alumno+nota);
//    alert($("#formnotas").serialize());
    $.post('index.php','controller=cursosemestre&action=getEditN&idalumno='+alumno+'&idevaluacion='+evaluacion+'&notas='+nota,function(data) {

//        alert("okis");
        $("#pachas").empty().append(data);
    });
    
         alert("Se inserto la Evaluacion");
          $.post('_tablaN.php','controller=cursosemestre&action=getCalificaiones&idsemestre='+codsemestre+'&idcurso='+codcurso,function(data) {

        $(".oli").empty().append(data);
    });
         $(campo).css("background","#008000");
          $(editarnota).css("display","");
     $(".nota").css("display","none");
    
    $(editarnota).html("<a><img  src='../web/images/edit.png' class='edit"+evaluacion+"'></a>");
  });

$(".ecp").live("click",function(){
    
//ys11    var curso=$("#curs").attr("value");
    var semestre=$("#semes").attr("value");
    $post('index.php','controller=cursosemestre&action=getBibliografia&curso='+curso+'&semestre='+semestre,function(data){
        
        $("#biblio").empty().append(data);
    });
});




//function inicio(){
//    var x =$("#unid");
//    x.click(mostrar);
//    $("#editsy").css("dispaly","none");
//    
//}
//
//function mostrar (){
//    
//    var x =$(".table");
//    x.live("toggler");
//}



function VerAsistencia(id) {
    var idsemestre = $("#semestreacademico").attr("value");
    var opt='dsa';

    alert(id)

//        $("#ola").css("display","none");
//        $("#agrandar").css("display","none");
$("#silaedit").css("display","none");

    $("#lista").css("display","none");
        $("#evaluaciones").css("display","none");
        $(".olassss").css("display","none");
    $.post('index.php', 'controller=cursosemestre&action=getUnidad&CodigoCurso=' + id + '&idSemestre=' + idsemestre+'&sin='+opt, function(data) {

        $("#unidadesA").empty().append(data);
       
        
    });
  


}

function TemasClase(idtema,idclase){
    

var semestre = $(".semestre").attr("value");
var curso = $(".curso").attr("value");
      var unidad =$("#idunidad").val();
      var esunidad=".codunidad"+unidad;
//      var idclase=$("#idclaseC").attr("value");
      var cerrar="codunidad"+unidad+" collapsed";
       
   
      $(esunidad).attr({
          'class':cerrar
      });
      
      $(".tema").attr({
          
          'class':'tema panel-collapse collapse',
          'style':'height: 0px'
          
      });
      
      $("#chau").css("display","none");
      $("#agrandar").attr({
         'class':'col-md-11'
     });
     if (idtema==="todavia"){
                      $("#Bregresar").html("<a href='index.php?controller=cursosemestre' class='button' id='regreS'>Regresar</a>");

         $("#agrandar").attr({
            
            'class':'col-md-11 col-md-offset-2'
            
        });
        
         alert("NO ES LA FECHA ESTALBECIDA");
         $(".tablaAsis").css("visibility","hidden");
     }else{
         if(idtema==="paso"){
                          $("#Bregresar").html("<a href='index.php?controller=cursosemestre' class='button' id='regreS'>Regresar</a>");

             $("#agrandar").attr({
            
            'class':'col-md-11 col-md-offset-2'
            
        });
        
             alert("El limite de tiempo caduco");
         $(".tablaAsis").css("visibility","hidden");

         }
         else{
             $("#Bregresar").html("<a href='index.php?controller=cursosemestre' class='button' id='regreS'>Regresar</a>");
         var opt="B";
                  $(".tablaAsis").css("visibility","");

    $.post('index.php', 'controller=cursosemestre&action=getListaA&idcurso='+curso + '&idSemestre=' + semestre+'&opcion='+opt, function(data) {
        
        $("#sillabus").css("display", "none");
//        $("#boton").css("display", "none");

       
        $(".tablaAsis").empty().append(data);
        $(".daridclase").html("<input type='hidden' class='idclase' value='"+idclase+"' />");
    });
        $("#agrandar").attr({
            
            'class':'col-md-11 col-md-offset-1'
            
        });
     }
 }
  
    
}

$("#enviarA").live("click",function(){
    var alumno =$('input[name="alumno[]"]').serialize();
    var asistencia =$('input[name="asisten[]"]').serialize();
    var clase =$(".idclase").attr("value");
    
   $.post('index.php','controller=cursosemestre&action=getAsistencia&idalumno='+alumno+'&idclase='+clase+'&asistencia='+asistencia,function(data) {

        $("#asisss").empty().append(data);
    });
    
    alert ("se inserto la asistencia");
    $("#ola").css("display","none");
    
});


function editSylabus(id){
     $(".recibS").css("display","");
    var vali="Sl";
                 $(".regresar").css("display","");
                 $(".ecp").attr({
                     
                     'style':'font-size: 12px;'
                 });
                 
                  $("#ampliar").attr({
                      'class':'col-md-onset-1' 
                 });

    $(".recibS").attr({
        
        'src':'index.php?controller=silabus&action=edit&id='+id+'&variable='+vali
    });
    $(".recibS").css("display","");
    
    $("#chau").css("display","none");
}


function edidUnidad(id){
    var vali="Sl";
                 $(".regresar").css("display","");
 $(".ecp").attr({
                     
                     'style':'font-size: 12px;'
                 });
    $(".recibS").remove();
    $(".recibU").css("display","");
    $(".recibU").attr({
        
        'src':'index.php?controller=unidad&action=edit&id='+id+'&variable='+vali
    });
    $(".recibU").css("display","");
        $("#chau").css("display","none");
    
   
}

//index.php?controller=tema&action=edit&id=

function edidTema(id){
     $(".ecp").attr({
                     
                     'style':'font-size: 12px;'
                 });
                  $("#ampliar").attr({
                      'class':'col-md-offset-3' 
                 });
                
    var vali="Sl";
    $(".recibS").remove();
    $(".recibU").remove();
    $(".recibT").css("display","");
    $(".recibT").attr({
        
        'src':'index.php?controller=tema&action=edit&id='+id+'&variable='+vali
    });
    $(".recibT").css("display","");
        $("#chau").css("display","none");
    
   
}

$(".regresar").live("click",function(){
      $("#chau").css("display","");
            $(".regresar").css("display","none");
    $(".recibS").remove();
    $(".recibU").remove();
    $(".recibT").remove();
 $(".ecp").attr({
                     
                     'style':''
                 });
                 
                  $("#ampliar").attr({
                      'class':'' 
                 });
    
});

$(".codunidad").live("click",function(){
    var unidad=$(".idunidad").attr("value");
    
    var opt='C';
$.post('index.php', 'controller=cursosemestre&action=getTema&Codigo=' +unidad+'&option='+opt, function(data) {
//$("#boton").css("display", "none");
        $(".temas").empty().append(data);
    });
});

function activa(param){
    $("#"+param).addClass("active");
}
