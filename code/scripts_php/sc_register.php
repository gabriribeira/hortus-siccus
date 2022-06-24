<?php

require_once("../connections/connection.php");
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);

if (isset($_POST["password"]) && isset($_POST["password_ver"]) && $_POST["password"] == $_POST["password_ver"]) {
    if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["nome_user"])) {
        $query = "SELECT email, username FROM users WHERE email = ? OR username = ?";
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'ss', $_POST["email"], $_POST["username"]);
            mysqli_stmt_execute($stmt);
            if (!mysqli_stmt_fetch($stmt)) {
                $query = "INSERT INTO users(username, nome_user, email, password_hash) VALUES ( ? , ? , ? , ?)";
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, 'ssss', $_POST["username"], $_POST["nome_user"], $_POST["email"], $password);
                    if (mysqli_stmt_execute($stmt)) {
                        header("Location: ../registo.php");
                    }else{
                        $msg = 3;
                    }
                    mysqli_stmt_close($stmt);
                }else{
                    $msg = 3;
                }
                mysqli_close($link);              
            }else{
                $msg = 4;
            }
        }else{
            $msg = 3;
        }
    }else{
        $msg = 2;
    }
}else{
    $msg = 1;
    var_dump($_POST);
}

//header("Location: ../registo.php?msg=$msg");