<?php

session_start();

if (isset($_POST["novo_local_check"]) && $_POST["novo_local_check"] == "on") {

    require_once("../../code/connections/connection.php"); // We need the function!
    $link = new_db_connection(); // Create a new DB connection

    $stmt = mysqli_stmt_init($link); // create a prepared statement
    $query = "INSERT INTO locais(local) VALUES(?)";
    if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
        mysqli_stmt_bind_param($stmt, 's', $_POST["nome_local_novo"]);
        mysqli_stmt_execute($stmt); // Execute the prepared statement
        mysqli_stmt_close($stmt); // Close statement
    }

    $stmt2 = mysqli_stmt_init($link); // create a prepared statement
    $query = "SELECT id_local FROM locais WHERE local = ?";
    if (mysqli_stmt_prepare($stmt2, $query)) { // Prepare the statement
        mysqli_stmt_bind_param($stmt2, 's', $_POST["nome_local_novo"]);
        mysqli_stmt_execute($stmt2); // Execute the prepared statement
        mysqli_stmt_bind_result($stmt2, $id_local_novo);
        mysqli_stmt_fetch($stmt2);
        mysqli_stmt_close($stmt2); // Close statement
    }

    $stmt3 = mysqli_stmt_init($link); // create a prepared statement
    $querycurrent = "INSERT INTO desafios(desafio, descricao_desafio, data_fim, locais_id_local) VALUES (?, ?, ?, ?)";
    $querydatanova = "INSERT INTO desafios(desafio, descricao_desafio, data_inicio, data_fim, locais_id_local) VALUES (?, ?, ?, ?, ?)";

    if (isset($_POST["data_inicio"]) && $_POST["data_inicio"] != "") {
        $query = $querydatanova;
        $bool = 0;
    } else {
        $query = $querycurrent;
        $bool = 1;
    }

    if ($bool == 0) {
        if (mysqli_stmt_prepare($stmt3, $query)) { // Prepare the statement
            mysqli_stmt_bind_param($stmt3, 'ssssi', $_POST["nome_desafio"], $_POST["descricao_desafio"], $_POST["data_inicio"], $_POST["data_fim"], $id_local_novo);
            mysqli_stmt_execute($stmt3); // Execute the prepared statement
            mysqli_stmt_close($stmt3); // Close statement
        }
    } else {
        if (mysqli_stmt_prepare($stmt3, $query)) { // Prepare the statement
            mysqli_stmt_bind_param($stmt3, 'sssi', $_POST["nome_desafio"], $_POST["descricao_desafio"], $_POST["data_fim"], $id_local_novo);
            mysqli_stmt_execute($stmt3); // Execute the prepared statement
            mysqli_stmt_close($stmt3); // Close statement
        }
    }

    

    mysqli_close($link); // Close connection

} else {

    require_once("../../code/connections/connection.php"); // We need the function!
    $link = new_db_connection(); // Create a new DB connection
    $stmt = mysqli_stmt_init($link); // create a prepared statement

    $querycurrent = "INSERT INTO desafios(desafio, descricao_desafio, data_fim, locais_id_local) VALUES (?, ?, ?, ?)";
    $querydatanova = "INSERT INTO desafios(desafio, descricao_desafio, data_inicio, data_fim, locais_id_local) VALUES (?, ?, ?, ?, ?)";

    if (isset($_POST["data_inicio"]) && $_POST["data_inicio"] != "") {
        $query = $querydatanova;
        $bool = 0;
    } else {
        $query = $querycurrent;
        $bool = 1;
    }


    if ($bool == 0) {
        if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
            mysqli_stmt_bind_param($stmt, 'ssssi', $_POST["nome_desafio"], $_POST["descricao_desafio"], $data_inicio, $_POST["data_fim"], $_POST["local"]);
            mysqli_stmt_execute($stmt); // Execute the prepared statement
            mysqli_stmt_close($stmt); // Close statement
        }
    } else {
        if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
            mysqli_stmt_bind_param($stmt, 'sssi', $_POST["nome_desafio"], $_POST["descricao_desafio"], $_POST["data_fim"], $_POST["local"]);
            mysqli_stmt_execute($stmt); // Execute the prepared statement
            mysqli_stmt_close($stmt); // Close statement
        }
    }

    mysqli_close($link); // Close connection

}

header("Location: ../eventos.php");
