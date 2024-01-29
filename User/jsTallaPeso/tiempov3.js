// Add Record
function addRecord() {
    // get values
    talla= document.getElementById("talla").value;
    peso= document.getElementById("peso").value;
    edad2= document.getElementById("edad2").value;
    //apelli_paterno= document.getElementById("apelli_paterno").value;
    if ( talla==="" || peso==="" || edad2===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos son obligatorios !'    
          })
          return false;

    }
    else 
    {
    var id_usuario = $("#id_usuario").val();
    var talla = $("#talla").val();
    var peso = $("#peso").val();
    var edad2 = $("#edad2").val();
    

    // Add record
    $.post("ajaxTallaPeso/addRecord.php", {
        id_usuario: id_usuario,
        talla: talla,
        peso:peso,
        edad2: edad2
       
    }, function (data, status) {
        // close the popup
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Grabados con Exito',
            showConfirmButton: false,
            timer: 1500
            
           
          })
          document.getElementById('records_content2').style.display='block';   
        $("#add_new_record_modal").modal("hide");
      
        // read records again
        readRecords();

        // clear fields from the popup
        $("#talla").val("");
        $("#peso").val("");
        $("#edad2").val("");
     
    });
}
}

// READ records
function readRecords() {
    $.get("ajaxTallaPeso/readRecord.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
    $.get("ajaxTallaPeso/grafica.php", {}, function (data, status) {
        $("#records_content2").html(data);
    });
  
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("ajaxTallaPeso/deleteUser.php", {
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
    $.post("ajaxTallaPeso/readUserDetails.php", {
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
    $.post("ajaxTallaPeso/updateUserDetails.php", {
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