// Add Record
function addRecord() {
    // get values
    var idalumno = $("#idalumno").val();
    var codalumno = $("#codalumno").val();
    var codmatri = $("#codmatri").val();
    var obs = $("#obs").val();

    // Add record
    $.post("ajaxCuenta/addRecord.php", {
        idalumno: idalumno,
        codalumno: codalumno,
        codmatri: codmatri,
		obs: obs
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#idalumno").val("");
        $("#codalumno").val("");
        $("#codmatri").val("");
        $("#obs").val("");
    });
}

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
                title: 'Agregada con Exito',
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