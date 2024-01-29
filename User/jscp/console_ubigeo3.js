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
                cadena +="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
                
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
    var iddepartamento = $("#sel_departamento").val();
    var idprovincia = $("#sel_provincia").val();
    var idlocalidad = $("#sel_distrito").val();
    var Nombre = $("#Nombre").val();
    var apellidoPater = $("#apellidoPater").val();
    var apellidoMater = $("#apellidoMater").val();
    var edadTuto = $("#edadTuto").val();
    var parentesco_tutor = $("#parentesco_tutor").val();
    
    var Nombre_menor = $("#Nombre_menor").val();
    var apellidoPaterMenor = $("#apellidoPaterMenor").val();
    var apellidoMaterno_Menor = $("#apellidoMaterno_Menor").val();
    var edad_Menor = $("#edad_Menor").val();
    var sexo_Menor = $("#sexo_Menor").val();
    var id_usuarioCP = $("#id_usuarioCP").val();
    
    

    // Realizar solicitud AJAX
    $.ajax({
        url: 'ajaxcp/addRecord.php',
        type: 'POST',
        data: {
            iddepartamento: iddepartamento,
            idprovincia: idprovincia,
            idlocalidad: idlocalidad,
            Nombre: Nombre,
            apellidoPater: apellidoPater,
            apellidoMater: apellidoMater,
            edadTuto: edadTuto,
            parentesco_tutor: parentesco_tutor,
            Nombre_menor: Nombre_menor,
            apellidoPaterMenor: apellidoPaterMenor,
            apellidoMaterno_Menor: apellidoMaterno_Menor,
            edad_Menor: edad_Menor,
            sexo_Menor: sexo_Menor,
            id_usuarioCP: id_usuarioCP
          
        },
        success: function(response) {
            // Hacer algo con la respuesta del servidor, si es necesario
            alert("Registro guardado correctamentetttt");
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX, si es necesario
            alert("Error al guardar el registreeeeeeeeeeeeo");
        }
    });
}
