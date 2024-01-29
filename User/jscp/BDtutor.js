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
      //  alert(iddepartamento);
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



var idlocalidad;

function listar_distrito(idprovincia){
    $.ajax({
        url: 'controlador/controlador_listar_distrito.php',
        type: 'POST',
        data: {
            idprovincia: idprovincia
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][0] + "</option>";
            }
            $("#sel_distrito").html(cadena);
            // Asignar el ID del distrito seleccionado a la variable global
            idlocalidad = data[0][0];
        } else {
            cadena += "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#sel_distrito").html(cadena);
        }
    })
}
function guardar() {

    
    var idlocalidad = $("#sel_distrito").val();

    // Realizar solicitud AJAX
    $.ajax({
        url: 'ajaxcp/addRecord.php',
        type: 'POST',   
        data: {
           
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
          
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX, si es necesario
            alert("Error al guardar el registreeeeeeeeeeeeo");
        }
    });
}
