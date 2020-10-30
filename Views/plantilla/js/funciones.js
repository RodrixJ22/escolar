$(document).ready( function () {
    $('#table').DataTable({
      responsive: true
    });
    

    

  

} );



$("#table").on("click",".btEditar", function(){
  var datos = JSON.parse($(this).attr('data-p'));
  console.log('f1');
  $("#idu").val(datos['id_usuario']);
  $("#aus").val(datos['nombre_usuario']);
  $("#acon").val(datos['password']);
  $("#atu").val(datos['Privilegio']);
});

$("#formEditarU").submit(function(e){
var id_usuario = $("#idu").val();
var nombre = $("#aus").val();
var clave = $("#acon").val();
var privilegio = $("#atu").val();

e.preventDefault();
$.ajax({
  url:'user/editaru/',
  type:'post',
  data:{'id_usuario':id_usuario,'nombre':nombre,'clave':clave,'privilegio':privilegio},
  success:function (respuesta) {
    $('#editarusuario').modal('hide');
    $("#table").DataTable().destroy();
    $("#table tbody").html(respuesta);
    $("#table").DataTable({responsive: true});
    
    
    Swal.fire(
      'Se actualizo con exito!',
      'el registro',
      'success'
    )


  }
  ,
  error:function () {
    console.log('Error');
  }
});
});





$("#table").on("click",".btBorrar", function () {

  Swal.fire({
      title: 'Está seguro?',
      text: "No podrá recuperar los datos!",
      icon: 'warning',
      confirmButtonColor: '#d9534f',
      cancelButtonColor: '#428bca',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminarlo!',
      cancelButtonText: 'No, cancelar',
      
      reverseButtons:true
  }).then((result) => {
      if (result.isConfirmed) {

        
        
        var id_usuario= $(this).attr('data-b');
       
          $.ajax({
            url: 'user/borrar/',
            type: "POST",
            data: {'id_usuario':id_usuario },
            success:function(respuesta){
              $("#table").DataTable().destroy();
              $("#table tbody").html(respuesta);
              $("#table").DataTable({responsive: true});

            }
            ,




                error: function () {
                  console.log('Error');
              }
          });

          Swal.fire(
            'Borrado',
            'el registro a sido eliminado',
            'success'


          )

      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ){
        Swal.fire(
        'cancelado',
        'el registro esta a salvo',
        'error'

        )

      }



  })
});


/* Funciones CRUD para seccion profesores */


/* Insertar Profesores */
$("#agregarProf").on("submit", function(e){

  var pn = $("#pn").val();
  var sn = $("#sn").val();
  var pa = $("#pa").val();
  var sa = $("#sa").val();
  var ced = $("#cedula").val();
  var fec = $("#fecha").val();
  var eda = $("#edad").val();
  var cel = $("#celular").val();
  var tel = $("#telefono").val();
  var dir = $("#direccion").val();
  var cod = $("#cod").val();
  var cor = $("#correo").val();
  e.preventDefault();
  $.ajax({
    url:'profesores/insertarprof/',
    type:'post',
    data:{'pn':pn,'sn':sn,'pa':pa,'sa':sa,'ced':ced,
    'fec':fec,'eda':eda,'cel':cel,'tel':tel,'dir':dir,
    'cod':cod,'cor':cor},
    success:function (respuesta) {
      $('#ingresarprof').modal('hide');
      $("#table").DataTable().destroy();
      $("#table tbody").html(respuesta);
      $("#table").DataTable({responsive: true});
      
      

      
      
      Swal.fire(
        'Se ingreso con exito!',
        'el registro',
        'success'
      )
  
  
    }
    ,
    error:function () {
      console.log('Error');
    }
  });
});



/* Editar Profesores 
 //console.log(datos);
*/

$("#table").on("click",".btEditarP",function(){
  var datos = JSON.parse($(this).attr('data-pr'));
 
   $("#idp").val(datos['id_docente']);
  $("#pnu").val(datos['p_nombre']);
  $("#snu").val(datos['s_nombre']);
  $("#pau").val(datos['p_apellido']);
  $("#sau").val(datos['s_apellido']);
  $("#cedulau").val(datos['cedula']);
  $("#fechau").val(datos['f_nacimiento']);
  $("#edadu").val(datos['edad']);
  $("#celularu").val(datos['celular']);
  $("#telefonou").val(datos['telefono']);
  $("#direccionu").val(datos['direccion']);
  $("#codu").val(datos['cod_docente']);
  $("#correou").val(datos['correo']); 
});

$("#formEditarP").submit(function(e){
var idp = $("#idp").val();
var p_n = $("#pnu").val();
var s_n = $("#snu").val();
var p_ap = $("#pau").val();
var s_ap = $("#sau").val();
var ced = $("#cedulau").val();
var fec = $("#fechau").val();
var eda = $("#edadu").val();
var cel = $("#celularu").val();
var tel = $("#telefonou").val();
var dir = $("#direccionu").val();
var cod = $("#codu").val();
var cor = $("#correou").val();

e.preventDefault();
$.ajax({
  url:'profesores/editarp/',
  type:'post',
  data:{'idp':idp,'p_n':p_n,'s_n':s_n,'p_ap':p_ap,'s_ap':s_ap,'ced':ced
  ,'fec':fec,'eda':eda,'cel':cel,'tel':tel,'dir':dir,'cod':cod,'cor':cor},
  success:function (respuesta) {
    $('#editarprof').modal('hide');
    $("#table").DataTable().destroy();
    $("#table tbody").html(respuesta);
    $("#table").DataTable({responsive: true});
    
    
    Swal.fire(
      'Se actualizo con exito!',
      'el registro',
      'success'
    )


  }
  ,
  error:function () {
    console.log('Error');
  }
});
});



/* Borrar Profesores */
$("#table").on("click",".btBorrarP", function () {


  Swal.fire({
      title: 'Está seguro?',
      text: "No podrá recuperar los datos!",
      icon: 'warning',
      confirmButtonColor: '#d9534f',
      cancelButtonColor: '#428bca',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminarlo!',
      cancelButtonText: 'No, cancelar',
      
      reverseButtons:true
  }).then((result) => {
      if (result.isConfirmed) {

        
        
        var id_p= $(this).attr('data-p');
       
          $.ajax({
            url: 'profesores/borrarp/',
            type: "POST",
            data: {'id_p':id_p },
            success:function(respuesta){
              $("#table").DataTable().destroy();
              $("#table tbody").html(respuesta);
              $("#table").DataTable({responsive: true});

            }
            ,




                error: function () {
                  console.log('Error');
              }
          });

          Swal.fire(
            'Borrado',
            'el registro a sido eliminado',
            'success'


          )

      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ){
        Swal.fire(
        'cancelado',
        'el registro esta a salvo',
        'error'

        )

      }



  })
});


/* Funciones CRUD para seccion Alumno */


/* Insertar Alumnos */
$("#agregarAlum").on("submit", function(e){

  var pna = $("#pna").val();
  var sna = $("#sna").val();
  var paa = $("#paa").val();
  var saa = $("#saa").val();
  var fechaa = $("#fechaa").val();
  var edada = $("#edada").val();
  var sexoa = $("#sexoa").val();
  var esta = $("#esta").val();
  var tela = $("#tela").val();
  var coda = $("#codigoa").val();
  var dep = $("#departa").val();
  var mun = $("#municipio").val();
  var direa = $("#direcciona").val();
  var tut= $("#tutor").val();
  e.preventDefault();
  $.ajax({
    url:'alumnos/insertaralum/',
    type:'post',
    data:{'pna':pna,'sna':sna,'paa':paa,'saa':saa,'fechaa':fechaa,
    'edada':edada,'sexoa':sexoa,'esta':esta,'tela':tela,'coda':coda,
    'dep':dep,'mun':mun,'direa':direa,'tut':tut},
    success:function (respuesta) {
      $('#agregarAlum').modal('hide');
      $("#table tbody").html(respuesta);
      $("#table").DataTable({responsive: true});
      

      
      
      Swal.fire(
        'Se ingreso con exito!',
        'el registro',
        'success'
      )
  
  
    }
    ,
    error:function () {
      console.log('Error');
    }
  });
});



/*  Editar Alumnos */

$("#table").on("click",".btEditarA",function(){
  var datos = JSON.parse($(this).attr('data-a'));
  $("#ida").val(datos['id_alumno']);
  $("#pnau").val(datos['p_nombre']);
  $("#snau").val(datos['s_nombre']);
  $("#paau").val(datos['p_apellido']);
  $("#saau").val(datos['s_apellido']);
  $("#fechaau").val(datos['f_nacimiento']);
  $("#edadau").val(datos['edad']);
  $("#sexoau").val(datos['sexo']);
  $("#estau").val(datos['estado_matricula']);
  $("#codigoau").val(datos['cod_alum']);
  $("#telau").val(datos['telefono_contac']);
  $("#direccionau").val(datos['direccion']);
  $("#departau").val(datos['departamento']);
  $("#municipiou").val(datos['municipio']);
  $("#tutoru").val(datos['nombre_tutor']);
});

$("#formEditarA").submit(function(e){
var ida = $("#ida").val();
var pna = $("#pnau").val();
var sna = $("#snau").val();
var paa = $("#paau").val();
var saa = $("#saau").val();
var feca = $("#fechaau").val();
var eda = $("#edadau").val();
var sex = $("#sexoau").val();
var estad = $("#estau").val();
var coda = $("#codigoau").val();
var tela = $("#telau").val();
var dira = $("#direccionau").val();
var depa = $("#departau").val();
var muna = $("#municipiou").val();
var tuta = $("#tutoru").val();

e.preventDefault();
$.ajax({
  url:'alumnos/editara/',
  type:'post',
  data:{'ida':ida,'pna':pna,'sna':sna,'paa':paa,'saa':saa,'feca':feca,'eda':eda
  ,'sex':sex,'estad':estad,'coda':coda,'tela':tela,'dira':dira,'depa':depa,'muna':muna,'tuta':tuta},
  success:function (respuesta) {
    $('#editarA').modal('hide');
    $("#table").DataTable().destroy();
    $("#table tbody").html(respuesta);
    $("#table").DataTable({responsive: true});
    
    
    Swal.fire(
      'Se actualizo con exito!',
      'el registro',
      'success'
    )


  }
  ,
  error:function () {
    console.log('Error');
  }
});
});


/*Borrar Alumnos */

/* Borrar Profesores */
$("#table").on("click",".btBorrarA", function () {


  Swal.fire({
      title: 'Está seguro?',
      text: "No podrá recuperar los datos!",
      icon: 'warning',
      confirmButtonColor: '#d9534f',
      cancelButtonColor: '#428bca',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminarlo!',
      cancelButtonText: 'No, cancelar',
      
      reverseButtons:true
  }).then((result) => {
      if (result.isConfirmed) {

        
        
        var id_a= $(this).attr('data-a');
       
          $.ajax({
            url: 'alumnos/borrara/',
            type: "POST",
            data: {'id_a':id_a },
            success:function(respuesta){
              $("#table").DataTable().destroy();
              $("#table tbody").html(respuesta);
              $("#table").DataTable();

            }
            ,




                error: function () {
                  console.log('Error');
              }
          });

          Swal.fire(
            'Borrado',
            'el registro a sido eliminado',
            'success'


          )

      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ){
        Swal.fire(
        'cancelado',
        'el registro esta a salvo',
        'error'

        )

      }



  })
});



/* Funciones CRUD para seccion Grupos */


/* Insertar Grupos */
$("#agregarGrup").on("submit", function(e){

  var axo = $("#axo").val();
  var sec = $("#sec").val();
  var tur = $("#turno").val();
  var mod = $("#mod").val();
  var prof = $("#prof").val();
  e.preventDefault();
  $.ajax({
    url:'grupos/insertargrup/',
    type:'post',
    data:{'axo':axo,'sec':sec,'tur':tur,'mod':mod,'prof':prof
    },
    success:function (respuesta) {
      $('#agregarGrupo').modal('hide');
      $("#table tbody").html(respuesta);
      $("#table").DataTable({responsive: true});
      

      
      
      Swal.fire(
        'Se ingreso con exito!',
        'el registro',
        'success'
      )
  
  
    }
    ,
    error:function () {
      console.log('Error');
    }
  });
});


/*  Editar Grupos */

$("#table").on("click",".btEditarG",function(){
  var datos = JSON.parse($(this).attr('data-g'));
  $("#idg").val(datos['id_grupo']);
  $("#axou").val(datos['axo']);
  $("#secu").val(datos['seccion']);
  $("#turnou").val(datos['turno']);
  $("#modu").val(datos['modalidad']);
  $("#profu").val(datos['docente_id_docente']);
  
});

$("#formEditarG").submit(function(e){
var idg = $("#idg").val();
var axou = $("#axou").val();
var secu = $("#secu").val();
var turu= $("#turnou").val();
var modu = $("#modu").val();
var profu = $("#profu").val();

e.preventDefault();
$.ajax({
  url:'grupos/editarg/',
  type:'post',
  data:{'idg':idg,'axou':axou,'secu':secu,'turu':turu,'modu':modu,'profu':profu},
  success:function (respuesta) {
    $('#editarGrupo').modal('hide');
    $("#table").DataTable().destroy();
    $("#table tbody").html(respuesta);
    $("#table").DataTable({responsive: true});
    
    Swal.fire(
      'Se actualizo con exito!',
      'el registro',
      'success'
    )


  }
  ,
  error:function () {
    console.log('Error');
  }
});
});


/* Borrar Grupos */
$("#table").on("click",".btBorrarG", function () {


  Swal.fire({
      title: 'Está seguro?',
      text: "No podrá recuperar los datos!",
      icon: 'warning',
      confirmButtonColor: '#d9534f',
      cancelButtonColor: '#428bca',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminarlo!',
      cancelButtonText: 'No, cancelar',
      
      reverseButtons:true
  }).then((result) => {
      if (result.isConfirmed) {

        
        
        var id_g= $(this).attr('data-g');
       
          $.ajax({
            url: 'grupos/borrarg/',
            type: "POST",
            data: {'id_g':id_g },
            success:function(respuesta){
              $("#table").DataTable().destroy();
              $("#table tbody").html(respuesta);
              $("#table").DataTable({responsive: true});

            }
            ,




                error: function () {
                  console.log('Error');
              }
          });

          Swal.fire(
            'Borrado',
            'el registro a sido eliminado',
            'success'


          )

      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ){
        Swal.fire(
        'cancelado',
        'el registro esta a salvo',
        'error'

        )

      }



  })
});



/* Funciones CRUD para seccion Materia */


/* Insertar Grupos */
$("#agregarMat").on("submit", function(e){

  var nm = $("#nm").val();
  var gru = $("#grup").val();
  
  e.preventDefault();
  $.ajax({
    url:'materia/insertarmat/',
    type:'post',
    data:{'nm':nm,'gru':gru
    },
    success:function (respuesta) {
      $('#agregarmateria').modal('hide');
      $("#table tbody").html(respuesta);
      $("#table").DataTable({responsive: true});
      

      
      
      Swal.fire(
        'Se ingreso con exito!',
        'el registro',
        'success'
      )
  
  
    }
    ,
    error:function () {
      console.log('Error');
    }
  });
});


/*  Editar Grupos */

$("#table").on("click",".btEditarM",function(){
  var datos = JSON.parse($(this).attr('data-m'));
  $("#idm").val(datos['id_materia']);
  $("#nmu").val(datos['nombre_materia']);
  $("#grupu").val(datos['grupos_id_grupo']);
  
});

$("#formEditarM").submit(function(e){
var idm = $("#idm").val();
var nmu = $("#nmu").val();
var grupu = $("#grupu").val();


e.preventDefault();
$.ajax({
  url:'materia/editarm/',
  type:'post',
  data:{'idm':idm,'nmu':nmu,'grupu':grupu},
  success:function (respuesta) {
    $('#editarMateria').modal('hide');
    $("#table").DataTable().destroy();
    $("#table tbody").html(respuesta);
    $("#table").DataTable({responsive: true});
    
    
    Swal.fire(
      'Se actualizo con exito!',
      'el registro',
      'success'
    )


  }
  ,
  error:function () {
    console.log('Error');
  }
});
});



/* Borrar Materia */
$("#table").on("click",".btBorrarM", function () {


  Swal.fire({
      title: 'Está seguro?',
      text: "No podrá recuperar los datos!",
      icon: 'warning',
      confirmButtonColor: '#d9534f',
      cancelButtonColor: '#428bca',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminarlo!',
      cancelButtonText: 'No, cancelar',
      
      reverseButtons:true
  }).then((result) => {
      if (result.isConfirmed) {

        
        
        var id_m= $(this).attr('data-m');
       
          $.ajax({
            url: 'materia/borrarm/',
            type: "POST",
            data: {'id_m':id_m },
            success:function(respuesta){
              $("#table").DataTable().destroy();
              $("#table tbody").html(respuesta);
              $("#table").DataTable({responsive: true});

            }
            ,




                error: function () {
                  console.log('Error');
              }
          });

          Swal.fire(
            'Borrado',
            'el registro a sido eliminado',
            'success'


          )

      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ){
        Swal.fire(
        'cancelado',
        'el registro esta a salvo',
        'error'

        )

      }



  })
});

