// Add Record

  
function addRecord() {
    // get values

    var Usuario = $("#Usuario").val();
    var Contraseña = $("#Contraseña").val();
    var newContraseña = $("#newContraseña").val();

    Usuario= document.getElementById("Usuario").value;
    Contraseña= document.getElementById("Contraseña").value;
    newContraseña= document.getElementById("newContraseña").value;
    
    
    var expReg= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var esValido= expReg.test(Usuario);
    if (esValido==false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Correo invalido'    
          })
          return false;
    } 

    if ( Contraseña===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los capos son obligatorios'    
          })
          return false;

    }
    if ( Contraseña!=newContraseña){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las contraseñas no coinciden'    
          })
          return false;

    }
    else 
    {
    

    // Add record
    $.post("ajax/addRecord.php", {
        Usuario: Usuario,
        Contraseña: Contraseña
		
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");
    
      
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cuenta agregada con Exito',
            showConfirmButton: false,
            timer: 1500
            
           
          })
          
          setTimeout(()=>{
            location.href ="../index.php"
          },2000);
           // read records again
       

        // clear fields from the popup
   
        $("#Usuario").val("");
        $("#Contraseña").val("");
        $("#newContraseña").val("");
    });
}
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
}
