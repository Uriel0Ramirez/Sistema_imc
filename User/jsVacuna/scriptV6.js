function addRecord() {
    // Obtener valores
    var vacuna = document.getElementById("vacuna").value;
    var vacunas_otras = document.getElementById("vacunas_otras").value;
    var dosis = document.getElementById("dosis").value;
    var edadVacuna = document.getElementById("edadVacuna").value;
    var id_usuarioVacunas = document.getElementById("id_usuarioVacunas").value;
  
    if ((vacuna === "" && vacunas_otras === "") || dosis === "" || edadVacuna === "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debes completar todos los campos obligatorios!'
      });
      return false;
    }
  
    var vacunaCompleta = vacuna + vacunas_otras;

    // Realizar la petición AJAX para verificar si la vacuna ya existe
    $.ajax({
      url: "ajaxVacuna/verificarVacuna.php",
      method: "POST",
      data: { vacuna: vacunaCompleta, dosis: dosis, edadVacuna: edadVacuna },
      success: function(data) {
        if (data === "existe") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Esta vacuna ya está registrada!'
          });
        } else {
          // La vacuna no existe o tiene diferente dosis y edad, insertar registro en la base de datos
          $.post("ajaxVacuna/addRecord.php", {
            vacuna: vacunaCompleta,
            dosis: dosis,
            edadVacuna: edadVacuna,
            id_usuarioVacunas: id_usuarioVacunas
          }, function (data, status) {
            // Cerrar el popup
            $("#add_new_record_modal").modal("hide");
  
            // Leer registros nuevamente
            readRecords();
  
            // Limpiar los campos del popup
            $("#vacuna").val("");
            $("#vacunas_otras").val("");
            $("#dosis").val("");
            $("#edadVacuna").val("");
          });
        }
      }
    });
  }
  
// READ records
function readRecords() {
  $.get("ajaxVacuna/readRecord.php", {}, function (data, status) {
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
        $.post("ajaxVacuna/deleteUser.php", { id: id },
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