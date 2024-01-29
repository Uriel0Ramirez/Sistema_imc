var iddepartamento;

function listar_departamento(){
    $.ajax({
        url:'controlador/controlador_listar_departamento.php',
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][1]+"'>"+data[i][1]+"</option>";
            }
            $("#sel_departamento").html(cadena);
            iddepartamento = $("#sel_departamento").val();
            listar_pronvincia(iddepartamento);
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_departamento").html(cadena);
        }
    })
}

function listar_pronvincia(iddepartamento){
    $.ajax({
        url:'controlador/controlador_listar_provincia.php',
        type:'POST',
        data:{
            iddepartamento:iddepartamento
        }
        
    }).done(function(resp){
    
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                cadena +="<option value='"+data[i][1]+"'>"+data[i][1]+"</option>";
              
            }
            $("#sel_provincia").html(cadena);
            var idprovincia = $("#sel_provincia").val();
            listar_distrito(idprovincia);
     
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_provincia").html(cadena);
        }
    })
}



function listar_distrito(idprovincia){
    $.ajax({
        url:'controlador/controlador_listar_distrito.php',
        type:'POST',
        data:{
            idprovincia:idprovincia
        }
    }).done(function(resp){
       
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for (var i =0; i < data.length; i++) {
                //cambiar el [1,0 ] para conocer los datos de la tabla 
                cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
            }
            $("#sel_distrito").html(cadena);
            var idlocalidad = $("#sel_distrito").val();
          
        }else{
            cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
            $("#sel_distrito").html(cadena);
        }
    })
}

function guardar() {

    
  
   var id_usuario = $("#id_usuario").val();
   var nombre = $("#nombre").val();
  var apellido_p = $("#apellido_p").val();
  var apellido_m = $("#apellido_m").val();
  var edadt = $("#edadt").val();
 var no_hijos = $("#no_hijos").val();
 var parentesco = $("#parentesco").val();
 var idlocalidad = $("#sel_distrito").val();
 var sel_departamento = $("#sel_departamento").val();

 alert(id_usuario);
 if ( nombre===""|| apellido_p ===""|| apellido_m ==="" || no_hijos===""|| parentesco===""|| sel_departamento===""){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Todos los campos son obligatorios !'    
      })
      return false;

}
else 
{


    // Realizar solicitud AJAX
    $.ajax({
        url: 'ajaxcp/addRecord.php',
        type: 'POST',   
        data: {
            id_usuario: id_usuario,
            nombre: nombre,
            apellido_p: apellido_p,
            apellido_m: apellido_m,
            edadt: edadt,
            no_hijos: no_hijos,
            parentesco: parentesco,
            idlocalidad: idlocalidad,
            
            
          
        },
        
        success: function(response) {
            // Hacer algo con la respuesta del servidor, si es necesario
           
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Datos guardado  con Exito',
                showConfirmButton: false,
                timer: 1500
                
               
              })
           document.getElementById('perfilform').style.display='none';
           document.getElementById('resultado').style.display='block'; 
           setTimeout(()=>{
            location.href ="datosTutor.php"
          },2000);
          
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX, si es necesario
            alert("Error al guardar el registro");
        }
    });
}}
