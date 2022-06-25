<?php

require_once("../connections/connection.php");
echo "ola";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT id_user, username, password_hash, roles_id_role FROM utilizadores WHERE username LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $username);

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $id_user, $username, $password_hash, $role);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $password_hash)) {
                    // Guardar sessão de utilizador
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["id_utilizador"] = $id_user;
                    $_SESSION["role"] = $role;
                    // Log in com sucesso
                    header("Location: ../feed.html");
                } else {
                    // Password errada
                    $_POST = "msg=2#login";
                    header("Location: ../login.html?msg=4");
                    //echo "Incorrect credentials!";
                    //echo "<a href='../login.php'>Try again</a>";
                }
            } else {
                // Username não existe
                //echo "Incorrect credentials!";
                //echo "<a href='../login.php'>Try again</a>";
                header("Location: ../login.html?msg=5");

            }
        } else {
            // Acção de erro
            //echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro
        //echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Campos do formulário por preencher";
}

