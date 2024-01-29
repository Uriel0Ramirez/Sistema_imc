<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../ajax/db_connection.php");

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM imc_menor  WHERE id_imc = '$user_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>