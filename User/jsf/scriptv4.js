// Add Record
function addRecord() {
    // get values
    var Nombre = $("#Nombre").val();
    var apellidoPater = $("#apellidoPater").val();
    var apellidoMater = $("#apellidoMater").val();
    var edadTuto = $("#edadTuto").val();
    var parentesco_tutor = $("#parentesco_tutor").val();
    
    var Nombre_menor = $("#Nombre_menor").val();
    var apellidoPaterMenor = $("apellidoPaterMenor").val();
  //  var parentesco_tutor = $("#parentesco_tutor").val();
  //  var parentesco_tutor = $("#parentesco_tutor").val();
   // var parentesco_tutor = $("#parentesco_tutor").val();


    alert("nadaBien "+apellidoPaterMenor);
    // Add record
    $.post("ajax/addRecord.php", {
        Nombre: Nombre,
        apellidoPater: apellidoPater,
        apellidoMater: apellidoMater,
        edadTuto: edadTuto,
        parentesco_tutor: parentesco_tutor,
        Nombre_menor: Nombre_menor,
        apellidoPaterno_menor: apellidoPaterMenor
    }, function (data, status) {
        // close the popup
       

        // read records again
        readRecords();

        // clear fields from the popup
        $("#Nombre").val("");
        $("#apellidoPater").val("");
        $("#apellidoMater").val("");
        $("#edadTuto").val("");
        $("#parentesco_tutor").val("");
        $("#Nombre_menor").val("");
        $("#apellidoPater_menor").val("");
    
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function (data, status) {
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
            $("#update_idalumno").val(user.idalumno);
            $("#update_codalumno").val(user.codalumno);
            $("#update_obs").val(user.obs);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var idalumno = $("#update_idalumno").val();
    var codalumno = $("#update_codalumno").val();
    var obs = $("#update_obs").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            idalumno: idalumno,
            codalumno: codalumno,
            obs: obs
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});