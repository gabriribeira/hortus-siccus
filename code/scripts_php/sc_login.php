<?php

require_once("../connections/connection.php");

if (isset($_POST["username"]) && isset($_POST["password"]) && ($_POST["username"]!="") && ($_POST["password"]!="") ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT id_user, username, password_hash, roles_id_role, nome_user, imagem_user FROM users WHERE username LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $username);

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $id_user,$username, $password_hash, $role, $nome_user, $imagem_user);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $password_hash)) {
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["id_utilizador"] = $id_user;
                    $_SESSION["nome_utilizador"] = $nome_user;
                    $_SESSION["imagem_utilizador"] = $imagem_user;
                    $_SESSION["role"] = $role;
                    header("Location: ../feed.html");
                } else {
                    header("Location: ../login.php?msg=1");
                }
            } else {
                header("Location: ../login.php?msg=1");

            }
        } else {
            header("Location: ../login.php?msg=3");
        }
    } else {
        header("Location: ../login.php?msg=3");

    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    header("Location: ../login.php?msg=2");

}

