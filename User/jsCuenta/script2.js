// Add Record
function addRecord() {
    // get values
    var nombre = $("#nombre").val();
    var usuario = $("#usuario").val();
    var Contraseña = $("#Contraseña").val();
    var newContraseña = $("#newContraseña").val();
    nombre= document.getElementById("nombre").value;
    usuario= document.getElementById("usuario").value;
    Contraseña= document.getElementById("Contraseña").value;
    newContraseña= document.getElementById("newContraseña").value;
 
    
    
    var expReg= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var esValido= expReg.test(usuario);
    if (esValido==false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Correo invalido'    
          })
          return false;
    } 

    if ( nombre===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los capos son obligatorios'    
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
    else{


    // Add record
    $.post("ajaxCuenta/addRecord.php", {
        nombre: nombre,
        usuario: usuario,
        Contraseña: Contraseña
       
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#nombre").val("");
     
    });
}}

// READ records
function readRecords() {
    $.get("ajaxCuenta/readRecord.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("ajaxCuenta/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajaxCuenta/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
       
            $("#update_pass").val(user.pass);
            $("#update_pass2").val(user.pass2);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var pass = $("#update_pass").val();
    var pass2 = $("#update_pass2").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    if ( pass===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los capos son obligatorios'    
          })
          return false;

    }
    if ( pass!=pass2){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las contraseñas no coinciden'    
          })
          return false;

    }
    else 
    {
    

    // Update the details by requesting to the server using ajax
    $.post("ajaxCuenta/updateUserDetails.php", {
            id: id,
            pass: pass
        
        },
        function (data, status) {
            // hide modal popup
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Cuenta agregada con Exito',
                showConfirmButton: false,
                timer: 1500
                
               
              })
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
    }
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});