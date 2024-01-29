var iddepartamento;

function listar_departamento(){
    $.ajax({
        url:'../controlador/controlador_listar_departamento.php',
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
        url:'../controlador/controlador_listar_provincia.php',
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
        url:'../controlador/controlador_listar_distrito.php',
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

    // Realizar solicitud AJAX
    $.ajax({
        url: '../ajax/addRecord.php',
        type: 'POST',
        data: {
            iddepartamento: iddepartamento,
            idprovincia: idprovincia,
            idlocalidad: idlocalidad
        },
        success: function(response) {
            // Hacer algo con la respuesta del servidor, si es necesario
            alert("Registro guardado correctamente");
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX, si es necesario
            alert("Error al guardar el registro");
        }
    });
}
