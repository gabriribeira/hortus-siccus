<?php

require_once "../connections/connection.php";
session_start();


if (isset($_POST["comentario"]) && isset($_SESSION["id_utilizador"]) ) {
    $id_user=$_SESSION['id_utilizador'];
    $id_user_destino = $_GET['id_user_d'];
    $comentario = $_POST['comentario'];

    $query = "INSERT INTO comentarios ( comentario, id_user_origem, id_user_destino) VALUES (?,?,?)";
    $link = new_db_connection(); //link para a connection que é a ligação para a bd
    $stmt = mysqli_stmt_init($link);
    if (mysqli_stmt_prepare($stmt, $query)) {
        //$data = date("Y-m-d");
        mysqli_stmt_bind_param($stmt, 'sii', $comentario,  $id_user, $id_user_destino);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../perfil.php?id=$id_user_destino#comentarios");
        } else {
            // Acção de erro da stmt
            //echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro de ligação à base de dados
        //echo "Error:" . mysqli_error($link);
        $_SESSION["values"] = $_POST;
        header("Location: ../contact.php?msg=0");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Adicione um comentario";
}