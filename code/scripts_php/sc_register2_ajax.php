<?php
    require_once('../connections/connection.php');

    // Create a new DB connection
    $link = new_db_connection();
    
    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "SELECT imagem_user FROM users WHERE username = ?";
    
    if (mysqli_stmt_prepare($stmt, $query)) {
        $user = $_POST["user"];
        mysqli_stmt_bind_param($stmt, 's' , $user);
        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)){
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $imagem);
    
            /* fetch values */
            $data = array();
            while (mysqli_stmt_fetch($stmt)) {
                $row_result = array();
                $row_result["imagem"] = htmlspecialchars($imagem);
                $data[] = $row_result;
            }
            print json_encode($data);
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    
        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($link);
    }
    
    /* close connection */
    mysqli_close($link);
    //$data = array();
    //$row_result = array();
    //$name = "teste";
    //$row_result["name"] = $name;
    //$data[] = $row_result;
    //print json_encode($data);