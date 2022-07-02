<?php


require_once("connections/connection.php");
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);

$query = "SELECT users.id_user, users.badges_id_badge, COUNT(registos.id_registo)
FROM users 
INNER JOIN registos ON users.id_user = registos.users_id_user
WHERE users_id_user = ?";

if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
    mysqli_stmt_bind_param($stmt, 'i', $_GET["id_user"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $active_badge, $total_registos);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}


switch ($active_badge) {
    case 1:
        if ($total_registos == 2 && $total_registos < 3) {
            $novo_badge = 2;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos == 3 && $total_registos < 4){
            $novo_badge = 3;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos == 4 && $total_registos < 5) {
            $novo_badge = 4;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos == 5 && $total_registos < 6) {
            $novo_badge = 5;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos == 6) {
            $novo_badge = 6;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        break;
    case 2:
        if($total_registos >= 3 && $total_registos < 4){
            $novo_badge = 3;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos >= 4 && $total_registos < 5) {
            $novo_badge = 4;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos >= 5 && $total_registos < 6) {
            $novo_badge = 5;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos >= 6) {
            $novo_badge = 6;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        break;

    case "3":
        if($total_registos >= 4 && $total_registos < 5) {
            $novo_badge = 4;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos >= 5 && $total_registos < 6) {
            $novo_badge = 5;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos >= 6) {
            $novo_badge = 6;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        break;

    case "4":
        if($total_registos >= 5 && $total_registos < 6) {
            $novo_badge = 5;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }else if($total_registos >= 6) {
            $novo_badge = 6;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        break;

    case "5":
        if($total_registos >= 6) {
            $novo_badge = 6;
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE users SET badges_id_badge = ?  WHERE id_user = ?";

            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                mysqli_stmt_bind_param($stmt, 'ii', $novo_badge, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        break;
}



mysqli_close($link);



