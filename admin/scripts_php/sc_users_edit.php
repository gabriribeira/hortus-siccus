<?php

session_start();
require_once("../../code/connections/connection.php"); // We need the function!
$link = new_db_connection(); // Create a new DB connection
$stmt = mysqli_stmt_init($link); // create a prepared statement

$query = "UPDATE users SET username = ?, email = ?, active = ?, roles_id_role = ?, nome_user = ? WHERE id_user = ?"; // Define the query
$queryadmin = "UPDATE users SET username = ?, email = ?, nome_user = ? WHERE id_user = ?"; // Define the query


if($_POST["id_roles"] == "2"){
    $roleform = 2;
}else{
    $roleform = 1;
}

if($_POST["active"] == "on"){
    $activeform = 1;
}else{
    $activeform = 0;
}

if($_SESSION["id_utilizador"] == $_POST["id_users"] && $_SESSION["role"] == 2){
    if (mysqli_stmt_prepare($stmt, $queryadmin)) { // Prepare the statement
        mysqli_stmt_bind_param($stmt, 'sssi', $_POST["username"], $_POST["email"], $_POST["nome_user"], $_POST["id_users"]);
        mysqli_stmt_execute($stmt); // Execute the prepared statement
        mysqli_stmt_close($stmt); // Close statement
    }
}else{
    if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
        mysqli_stmt_bind_param($stmt, 'ssiisi', $_POST["username"], $_POST["email"], $activeform, $roleform, $_POST["nome_user"], $_POST["id_users"]);
        mysqli_stmt_execute($stmt); // Execute the prepared statement
        mysqli_stmt_close($stmt); // Close statement
    }
}


mysqli_close($link); // Close connection

header("Location: ../user-edit.php?id=" . $_POST["id_users"]);
