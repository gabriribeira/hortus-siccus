<?php

session_start();

require_once("../connections/connection.php"); // We need the function!
$link = new_db_connection(); // Create a new DB connection
$stmt = mysqli_stmt_init($link); // create a prepared statement 
$delete = 0;
$query = "SELECT users_id_user, seguidor
FROM seguidores 
INNER JOIN users ON users_id_user = users.id_user
WHERE users_id_user = ?";

if (isset($_GET["id"]) && $_GET["id"] != "") {

    if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
        mysqli_stmt_bind_param($stmt, 'i', $_GET["id"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $user, $seguidor);
        if (mysqli_stmt_fetch($stmt)) {
            $delete = 1;
        } else {
            $delete = 0;
            $queryinsert = "INSERT INTO seguidores(users_id_user, seguidor) VALUES ( ?, ? )";
            $stmt2 = mysqli_stmt_init($link); // create a prepared statement 
            if (mysqli_stmt_prepare($stmt2, $queryinsert)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt2, 'ii', $_GET["id"], $_SESSION["id_utilizador"]);
                mysqli_stmt_execute($stmt2);
            }
            mysqli_stmt_close($stmt2);

            header("Location: ../perfil.php?id=" . $_GET['id']);
        }
        mysqli_stmt_close($stmt);
    }

    if ($delete == 1) {
        $querydelete = "DELETE FROM seguidores WHERE users_id_user = ? AND seguidor = ?";
        $stmt3 = mysqli_stmt_init($link); // create a prepared statement 
        if (mysqli_stmt_prepare($stmt3, $querydelete)) { // Prepare the statement
            mysqli_stmt_bind_param($stmt3, 'ii', $_GET["id"], $_SESSION["id_utilizador"]);
            mysqli_stmt_execute($stmt3);
        }
        mysqli_stmt_close($stmt3);
        header("Location: ../perfil.php?id=" . $_GET['id']);
    }

    mysqli_close($link);
}else{
    header("Location: ../perfil.php?id=" . $_GET['id']);
}
