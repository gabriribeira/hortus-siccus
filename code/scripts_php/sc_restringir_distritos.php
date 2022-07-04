<?php
require_once('../connections/connection.php');

// Create a new DB connection
$link = new_db_connection();

/* create a prepared statement */
$stmt = mysqli_stmt_init($link);
$query = "SELECT id_concelho, concelho
FROM concelhos 
WHERE distritos_id_distrito LIKE ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'i', $_POST["value"]);
    /* execute the prepared statement */
    if (mysqli_stmt_execute($stmt)) {
        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $id, $nome);

        /* fetch values */
        $data = array();
        while (mysqli_stmt_fetch($stmt)) {
            $row_result = array();
            $row_result["id"] =  htmlspecialchars($id);
            $row_result["nome"] = htmlspecialchars($nome);
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
