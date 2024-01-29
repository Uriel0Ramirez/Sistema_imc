// Add Record
function addRecord() {
    // get values
    vacuna= document.getElementById("vacuna").value;
    vacunas_otras= document.getElementById("vacunas_otras").value;
    dosis= document.getElementById("dosis").value;
    edadVacuna= document.getElementById("edadVacuna").value;

    var vacuna= $("#vacuna").val()+ $("#vacunas_otras").val();
    var dosis = $("#dosis").val();
    var edadVacuna  = $("#edadVacuna").val();
 

    $.post("ajax/addRecord.php", {
        vacuna: vacuna,
        dosis: dosis,
        edadVacuna: edadVacuna
 
    
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#vacuna").val("");
     
    });
}

// READ records
function readRecords() {
  $.get("ajax/readRecord.php", {}, function (data, status) {
      $("#records_content").html(data);
  });
}


function DeleteUser(id) {
    Swal.fire({
      title: '¿Está seguro?',
      text: "¡No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminarlo'
    }).then((result) => {
      if (result.isConfirmed) {
        $.post("ajax/deleteUser.php", { id: id },
          function (data, status) {
            Swal.fire(
              '¡Eliminado!',
              'El registro ha sido eliminado.',
              'success'
            );
            // Recargar los usuarios utilizando readRecords();
            readRecords();
          }
        );
      }
    });
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