// Add Record
function addRecord() {
    // get values
    var id_usuario = $("#id_usuario").val();
    var nombre = $("#nombre").val();
   var apellido_p = $("#apellido_p").val();
  var apellido_m = $("#apellido_m").val();
   var edadt = $("#edadt").val();
   var no_hijos = $("#no_hijos").val();
   var parentesco = $("#parentesco").val();



    // Add record
    $.post("ajaxcp/addRecord.php", {
        id_usuario: id_usuario,
            nombre: nombre,
            apellido_p: apellido_p,
            apellido_m: apellido_m,
            edadt: edadt,
            no_hijos: no_hijos,
            parentesco: parentesco,
     
        
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();
        setTimeout(()=>{
            location.href ="datosTutor.php"
          },500);
          let timerInterval
Swal.fire({
  title: 'Auto close alert!',
  html: 'I will close in <b></b> milliseconds.',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})

        // clear fields from the popup
        $("#idalumno").val("");
        $("#codalumno").val("");
        $("#codmatri").val("");
        $("#obs").val("");
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