
// READ records
function readRecords() {
    $.get("ajax_tutor/readtutor.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
}




function GetUserDetails(id) {
    // Agrega el ID de usuario al campo oculto para uso futuro
    $("#hidden_user_id").val(id);
    $.post(
      "ajax_tutor/readUserDetails.php",
      {
        id: id,
      },
      function (data, status) {
        // DESCIFRA los datos encriptados
        var decryptedData = CryptoJS.AES.decrypt(data, "clave_de_cifrado"); // Reemplaza "clave_de_cifrado" por tu clave real
  
        // PARSEA los datos JSON descifrados
        var user = JSON.parse(decryptedData.toString(CryptoJS.enc.Utf8));
  
        // Asigna los valores existentes a los campos emergentes del modal
        $("#update_nombre").val(user.nombre);
        $("#update_apellido_p").val(user.apellido_p);
        $("#update_apellido_m").val(user.apellido_m);
  
        // Abre el modal
        $("#update_user_modal").modal("show");
      }
    );
  }
  

function UpdateUserDetails() {
    // get values
    var nombre = $("#update_nombre").val();
    var apellido_p = $("#update_apellido_p").val();
    var apellido_m = $("#update_apellido_m").val();
  

    if ( nombre===""||apellido_p===""|| apellido_m===""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Todos los campos del tutor son obligatorios !'    
          })
          return false;
    

    }
   
    else 
    {
    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax_tutor/updateUserDetails.php", {
            id: id,
            nombre: nombre,
            apellido_p: apellido_p,
            apellido_m: apellido_m,
            
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