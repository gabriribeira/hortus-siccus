<?php
require_once('../connections/connection.php');

// Create a new DB connection
$link = new_db_connection();

/* create a prepared statement */
$stmt = mysqli_stmt_init($link);
$query = "SELECT plantas.id_plantas, plantas.nome_cientifico, plantas_vulgares.nome_vulgar
FROM plantas 
INNER JOIN plantas_vulgares
ON plantas.id_plantas = plantas_vulgares.plantas_id_plantas
WHERE plantas.nome_cientifico LIKE ? OR plantas_vulgares.nome_vulgar LIKE ? 
LIMIT 3";

if (mysqli_stmt_prepare($stmt, $query)) {
    $tecla = "%" . $_POST["tecla"] . "%";
    mysqli_stmt_bind_param($stmt, 'ss', $tecla, $tecla);
    /* execute the prepared statement */
    if (mysqli_stmt_execute($stmt)) {
        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $id, $nome, $planta_vulgar);

        /* fetch values */
        $data = array();
        while (mysqli_stmt_fetch($stmt)) {
            $row_result = array();
            $row_result["id"] = $id;
            $row_result["nome"] = $nome;
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
