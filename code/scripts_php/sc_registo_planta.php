<?php

session_start();

require_once('../connections/connection.php');

// Create a new DB connection
$link = new_db_connection();


if (isset($_POST["familia"]) && isset($_POST["estado"]) && isset($_POST["origem"]) && isset($_POST["estatuto"]) && isset($_POST["data"]) && isset($_POST["local"]) && isset($_POST["distrito"]) && isset($_POST["concelho"]) && isset($_POST["freguesia"]) && isset($_POST["referencia"]) && isset($_POST["descricao"]) && isset($_POST["montra"]) && isset($_POST["hebario"])) {

    if (isset($_POST["check_nova_planta"]) && $_POST["check_nova_planta"] == "on" && isset($_POST["nome_cientifico"]) && isset($_POST["comum"])) {

        /* create a prepared statement */
        $stmt = mysqli_stmt_init($link);
        $query = "INSERT INTO plantas(nome_cientifico, origens_id_origem, estatutos_id_estatuto, familias_plantas_id_familia) VALUES (?, ?, ?, ?)";
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'ssss', $_POST["nome_cientifico"], $_POST["origem"], $_POST["estatuto"], $_POST["familia"]);
            /* execute the prepared statement */
            if (mysqli_stmt_execute($stmt)) {
                /* bind result variables */
                mysqli_stmt_bind_result($stmt, $id, $nome, $planta_vulgar);
                mysqli_stmt_fetch($stmt);
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }

            /* close statement */
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt); // Close statement

    }

    if (isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["name"] != "") {

        $target_dir = "../images/uploads/originals/";
        $target_dir_medium = "../images/uploads/medium/";
        $target_dir_small = "../images/uploads/small/";
        $tgt_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($tgt_file, PATHINFO_EXTENSION));
        $uniqid = uniqid();
        $target_file = $target_dir . "user_" . $username . "_profilepic_" . $uniqid . "." . $imageFileType;
        $uploadOk = 1;
        define('MB', 1048576);

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
            // Check if file already exists
            if (!file_exists($target_file)) {
                $uploadOk = 1;

                // Check file size
                if ($_FILES["fileToUpload"]["size"] <= (5 * MB)) {
                    $uploadOk = 1;
                    // Allow certain file formats
                    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                        $uploadOk = 1;

                        if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
                            $uploadedfile = $_FILES['fileToUpload']['tmp_name'];
                            $src = imagecreatefromjpeg($uploadedfile);
                        } else if ($imageFileType == "png") {
                            $uploadedfile = $_FILES['fileToUpload']['tmp_name'];
                            $src = imagecreatefrompng($uploadedfile);
                        } else {
                            $src = imagecreatefromgif($uploadedfile);
                        }

                        list($width, $height) = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        $newwidthsmall = 40;
                        $newheightsmall = 40;
                        $newwidthmedium = 230;
                        $newheightmedium = 230;
                        $tmp = imagecreatetruecolor($newwidthsmall, $newheightsmall);
                        $tmp = imagecreatetruecolor($newwidthmedium, $newheightmedium);
                        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthsmall, $newheightsmall, $width, $height);
                        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthmedium, $newheightmedium, $width, $height);
                        $filenamesmall = $target_dir_small . "user_" . $username . "_profilepic_" . $uniqid . "." . $imageFileType;
                        $filenamemedium = $target_dir_medium . "user_" . $username . "_profilepic_" . $uniqid . "." . $imageFileType;
                        imagejpeg($tmp, $filenamesmall, 100);
                        imagejpeg($tmp, $filenamemedium, 100);
                        $filename = "user_" . $username . "_profilepic_" . $uniqid . "." . $imageFileType;

                        $query = "INSERT INTO registos(users_id_user, plantas_id_plantas, descricao, imagem_registo, estados_id_estado, distrito_id_distrito, concelhos_id_concelho, freguesias_id_freguesia, ponto_referencia, local_colheita, montra, herbario_ua) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                        if (mysqli_stmt_prepare($stmt, $query)) {
                            mysqli_stmt_bind_param($stmt, 'iissiiiissii', $_SESSION["id_utilizador"], $_POST[""]);
                            /* execute the prepared statement */
                            if (mysqli_stmt_execute($stmt)) {
                                /* bind result variables */
                                mysqli_stmt_bind_result($stmt, $id, $nome, $planta_vulgar);
                                mysqli_stmt_fetch($stmt);
                            } else {
                                echo "Error: " . mysqli_stmt_error($stmt);
                            }

                            /* close statement */
                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Error: " . mysqli_error($link);
                        }
                        mysqli_stmt_close($stmt); // Close statement
                    }
                    mysqli_close($link); // Close connection

                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                    header("Location: ../perfil.php?id=$id_user");
                } else {
                    $msg = 9;
                    header("Location: ../registo2.php?msg=" . $msg);
                }
            } else {
                $msg = 8;
                header("Location: ../registo2.php?msg=" . $msg);
            }
        } else {
            $msg = 7;
            header("Location: ../registo2.php?msg=" . $msg);
        }
    } else {
        $msg = 4;
        header("Location: ../registo2.php?msg=" . $msg);
    }
}
