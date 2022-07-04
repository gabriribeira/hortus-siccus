<?php

require_once "../connections/connection.php";
session_start();



if ( isset($_SESSION["id_utilizador"]) ) {
    $id_user=$_SESSION['id_utilizador'];
    $id_c = $_GET['id_c'];

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);


    $query = "DELETE FROM comentarios WHERE id_comentario =? AND id_user_origem=?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $id_c, $id_user);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../perfil.php?id=$id_user#comentarios");
        } else {
            // Acção de erro da stmt
            //echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro de ligação à base de dados
        //echo "Error:" . mysqli_error($link);
        header("Location: ../login.php");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    header("Location: ../login.php");
}