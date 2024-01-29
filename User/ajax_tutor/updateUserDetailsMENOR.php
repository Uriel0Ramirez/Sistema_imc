<?php
// include Database connection file
include("db_connection.php");

// include Database connection file

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];

    // Define la clave para el cifrado AES
    $clave = "clave_secreta"; // Reemplaza con tu clave segura

    // Encripta los valores
    $nombre_encriptado = openssl_encrypt($nombre, 'AES-256-CBC', $clave, 0, '1234567890123456');
    $apellido_p_encriptado = openssl_encrypt($apellido_p, 'AES-256-CBC', $clave, 0, '1234567890123456');
    $apellido_m_encriptado = openssl_encrypt($apellido_m, 'AES-256-CBC', $clave, 0, '1234567890123456');

    // Updaste User details
    $query = "UPDATE menor SET nombre='$nombre_encriptado', apellido_p='$apellido_p_encriptado', apellido_m='$apellido_m_encriptado' WHERE id_menor = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
