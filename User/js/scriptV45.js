// Add Record
function addRecord() {
    // get values
    nombre= document.getElementById("nombre").value;
    apelli_paterno= document.getElementById("apelli_paterno").value;
    //nombre= document.getElementById("nombre").value;
    //nombre= document.getElementById("nombre").value;
   // nombre= document.getElementById("nombre").value;
 
    if ( nombre===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos son obligatorios !'    
          })
          return false;

    }
    else 
    {
    var nombre = $("#nombre").val();
    var apelli_paterno = $("#apelli_paterno").val();
    var apelli_Materno = $("#apelli_Materno").val();
    var obs = $("#obs").val();
    var sexo = $("#sexo").val();
    var fecha_Nacimiento = $("#fecha_Nacimiento").val();
    var edads = $("#edads").val();

    // Add record
    $.post("ajax/addRecord.php", {
        nombre: nombre,
        apelli_paterno: apelli_paterno,
        apelli_Materno: apelli_Materno,
		obs: obs,
        sexo: sexo,
        fecha_Nacimiento: fecha_Nacimiento,
        edads: edads
    }, function (data, status) {
        // close the popup
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cuenta agregada con Exito',
            showConfirmButton: false,
            timer: 1500
            
           
          })
          document.getElementById('perfilform').style.display='none';
          document.getElementById('resultado').style.display='block';       

      
        // read records again
        readRecords();

        // clear fields from the popup
        $("#nombre").val("");
 
        $("#apelli_Materno").val("");
        $("#obs").val("");
        $("#sexo").val("");
        $("#fecha_Nacimiento").val("");
        $("#edads").val("");
    });
}
}
// READ records
function readRecords() {
    $.get("ajax_tutor/readtutor.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
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
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_Nombre").val(user.Nombre);
            $("#update_ApellidoPaterno").val(user.apelli_Paterno);
            $("#update_ApellidoMaterno").val(user.apelli_Materno);
            $("#update_NombreMenor").val(user.Nombre_menor);
            $("#update_ApellidoPaterno_Menor").val(user.apellidoPater_menor);
            $("#update_ApellidoMaterno_Menor").val(user.apellidoMaterno_Menor);
            
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var Nombre = $("#update_Nombre").val();
    var apelli_Paterno = $("#update_ApellidoPaterno").val();
    var apelli_Materno = $("#update_ApellidoMaterno").val();
    var Nombre_menor = $("#update_NombreMenor").val();
    var apellidoPater_menor = $("#update_ApellidoPaterno_Menor").val();
    var apellidoMaterno_Menor = $("#update_ApellidoMaterno_Menor").val();

    if ( Nombre===""|| apelli_Materno===""|| apelli_Paterno===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos del tutor son obligatorios !'    
          })
          return false;
    

    }
    if ( Nombre_menor===""|| apellidoPater_menor===""|| apellidoMaterno_Menor===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos del menor son obligatorios !'    
          })
          return false;
        }
    else 
    {
    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            Nombre: Nombre,
            apelli_Paterno: apelli_Paterno,
            apelli_Materno: apelli_Materno,
            Nombre_menor: Nombre_menor,
            apellidoPater_menor: apellidoPater_menor,
            apellidoMaterno_Menor: apellidoMaterno_Menor
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Actualizados con Exito',
    showConfirmButton: false,
    timer: 1500
    
   
  })
}
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});