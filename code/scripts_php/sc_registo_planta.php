<?php

session_start();

require_once('../connections/connection.php');

// Create a new DB connection
$link = new_db_connection();

var_dump($_FILES);
var_dump($_POST);

if (isset($_POST["familia"]) && $_POST["familia"] != "" && isset($_POST["estado"]) && $_POST["estado"] != "" && isset($_POST["origem"]) && $_POST["origem"] != "" && isset($_POST["estatuto"]) && $_POST["estatuto"] != "" && isset($_POST["data"]) && $_POST["data"] != "" && isset($_POST["comum"]) && $_POST["comum"] != "" && isset($_POST["local"]) && $_POST["local"] != "" && isset($_POST["distrito"]) && $_POST["distrito"] != "" && isset($_POST["concelho"]) && $_POST["concelho"] != "" && isset($_POST["freguesia"]) && $_POST["freguesia"] != "" && isset($_POST["referencia"]) && $_POST["referencia"] != "" && isset($_POST["descricao"]) && $_POST["descricao"] != "" && isset($_POST["pasta"]) && $_POST["pasta"] != "") {

    if (isset($_POST["check_nova_planta"]) && $_POST["check_nova_planta"] == "on" && isset($_POST["nome_cientifico"]) && isset($_POST["comum"])) {


        if (isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["name"] != "") {

            $target_dir = "../images/uploads/registos_plantas/originals/";
            $target_dir_big = "../images/uploads/registos_plantas/grande/";
            $target_dir_medium = "../images/uploads/registos_plantas/medium/";
            $target_dir_small = "../images/uploads/registos_plantas/small/";
            $tgt_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($tgt_file, PATHINFO_EXTENSION));
            $uniqid = uniqid();
            $target_file = $target_dir . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
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
                            $newwidthsmall = 30;
                            $newheightsmall = 35;
                            $newwidthmedium = 101;
                            $newheightmedium = 130;
                            $newwidthbig = 200;
                            $newheightbig = 230;
                            $tmp = imagecreatetruecolor($newwidthsmall, $newheightsmall);
                            $tmp = imagecreatetruecolor($newwidthmedium, $newheightmedium);
                            $tmp = imagecreatetruecolor($newwidthbig, $newheightbig);
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthsmall, $newheightsmall, $width, $height);
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthmedium, $newheightmedium, $width, $height);
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthbig, $newheightbig, $width, $height);
                            $filenamesmall = $target_dir_small . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
                            $filenamemedium = $target_dir_medium . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
                            $filenamebig = $target_dir_big . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
                            imagejpeg($tmp, $filenamesmall, 100);
                            imagejpeg($tmp, $filenamemedium, 100);
                            imagejpeg($tmp, $filenamebig, 100);
                            $filename = "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;

                            $stmt = mysqli_stmt_init($link);
                            $query = "INSERT INTO plantas(nome_cientifico, origens_id_origem, estatutos_id_estatuto, familias_plantas_id_familia) VALUES (?, ?, ?, ?)";
                            if (mysqli_stmt_prepare($stmt, $query)) {
                                mysqli_stmt_bind_param($stmt, 'ssss', $_POST["nome_cientifico"], $_POST["origem"], $_POST["estatuto"], $_POST["familia"]);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_close($stmt);
                            } else {
                                echo "Error: " . mysqli_error($link);
                            }

                            $stmt1 = mysqli_stmt_init($link);
                            $query = "SELECT id_plantas FROM plantas WHERE nome_cientifico = ?";
                            if (mysqli_stmt_prepare($stmt1, $query)) {
                                mysqli_stmt_bind_param($stmt1, 's', $_POST["nome_cientifico"]);
                                mysqli_stmt_execute($stmt1);
                                mysqli_stmt_bind_result($stmt1, $id_planta);
                                mysqli_stmt_fetch($stmt1);
                                mysqli_stmt_close($stmt1);
                            } else {
                                echo "Error: " . mysqli_error($link);
                            }

                            $stmt2 = mysqli_stmt_init($link);
                            $query = "INSERT INTO plantas_vulgares(nome_vulgar, plantas_id_plantas) VALUES (?, ?)";
                            if (mysqli_stmt_prepare($stmt2, $query)) {
                                mysqli_stmt_bind_param($stmt2, 'si', $_POST["comum"], $id_planta);
                                mysqli_stmt_execute($stmt2);
                                mysqli_stmt_close($stmt2);
                            } else {
                                echo "Error: " . mysqli_error($link);
                            }

                            $stmt3 = mysqli_stmt_init($link);
                            $query = "INSERT INTO registos(users_id_user, plantas_id_plantas, descricao, imagem_registo, estados_id_estado, distrito_id_distrito, concelhos_id_concelho, freguesias_id_freguesia, ponto_referencia, local_colheita, montra, herbario_ua, pastas_id_pasta) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            if (mysqli_stmt_prepare($stmt3, $query)) {
                                mysqli_stmt_bind_param($stmt3, 'iissiiiissiii', $_SESSION["id_utilizador"], $id_planta, $_POST["descricao"], $filename, $_POST["estado"], $_POST["distrito"], $_POST["concelho"], $_POST["freguesia"], $_POST["referencias"], $_POST["local"], $_POST["montra"], $_POST["herbario"], $_POST["pasta"]);
                                mysqli_stmt_execute($stmt3);
                                mysqli_stmt_close($stmt3);
                            } else {
                                echo "Error: " . mysqli_error($link);
                            }

                            $stmt9 = mysqli_stmt_init($link);
                            $query = "SELECT id_registo FROM registos WHERE users_id_user = ? AND imagem_registo = ?";
                            if (mysqli_stmt_prepare($stmt9, $query)) {
                                mysqli_stmt_bind_param($stmt9, 'is', $_SESSION["id_utilizador"], $filename);
                                mysqli_stmt_execute($stmt9);
                                mysqli_stmt_bind_result($stmt9, $id_registo);
                                mysqli_stmt_fetch($stmt9);
                                mysqli_stmt_close($stmt9);
                            } else {
                                echo "Error: " . mysqli_error($link);
                            }
                        }

                        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                        header("Location: ../planta_individual.php?id_registo=$id_registo");
                    } else {
                        $msg = 5;
                        header("Location: registar-planta.php?msg=" . $msg);
                    }
                } else {
                    $msg = 4;
                    header("Location: registar-planta.php?msg=" . $msg);
                }
            } else {
                $msg = 3;
                header("Location: registar-planta.php?msg=" . $msg);
            }
        } else {
            $msg = 2;
            header("Location: registar-planta.php?msg=" . $msg);
        }
        mysqli_close($link); // Close connection
    } else {

        if (isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["name"] != "") {

            $target_dir = "../images/uploads/registos_plantas/originals/";
            $target_dir_big = "../images/uploads/registos_plantas/grande/";
            $target_dir_medium = "../images/uploads/registos_plantas/medium/";
            $target_dir_small = "../images/uploads/registos_plantas/small/";
            $tgt_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($tgt_file, PATHINFO_EXTENSION));
            $uniqid = uniqid();
            $target_file = $target_dir . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
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
                            $newwidthsmall = 30;
                            $newheightsmall = 35;
                            $newwidthmedium = 101;
                            $newheightmedium = 130;
                            $newwidthbig = 200;
                            $newheightbig = 230;
                            $tmp = imagecreatetruecolor($newwidthsmall, $newheightsmall);
                            $tmp = imagecreatetruecolor($newwidthmedium, $newheightmedium);
                            $tmp = imagecreatetruecolor($newwidthbig, $newheightbig);
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthsmall, $newheightsmall, $width, $height);
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthmedium, $newheightmedium, $width, $height);
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthbig, $newheightbig, $width, $height);
                            $filenamesmall = $target_dir_small . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
                            $filenamemedium = $target_dir_medium . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
                            $filenamebig = $target_dir_big . "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;
                            imagejpeg($tmp, $filenamesmall, 100);
                            imagejpeg($tmp, $filenamemedium, 100);
                            imagejpeg($tmp, $filenamebig, 100);
                            $filename = "registo_" . $_SESSION["id_utilizador"] . "_" . $uniqid . "." . $imageFileType;

                            $stmt3 = mysqli_stmt_init($link);
                            $query = "INSERT INTO registos(users_id_user, plantas_id_plantas, descricao, imagem_registo, estados_id_estado, distrito_id_distrito, concelhos_id_concelho, freguesias_id_freguesia, ponto_referencia, local_colheita, montra, herbario_ua, pastas_id_pasta) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            if (mysqli_stmt_prepare($stmt3, $query)) {
                                mysqli_stmt_bind_param($stmt3, 'iissiiiissiii', $_SESSION["id_utilizador"], $_POST["id_planta"], $_POST["descricao"], $filename, $_POST["estado"], $_POST["distrito"], $_POST["concelhos"], $_POST["freguesias"], $_POST["referencias"], $_POST["local"], $_POST["montra"], $_POST["herbario"], $_POST["pasta"]);
                                mysqli_stmt_execute($stmt3);
                                mysqli_stmt_close($stmt3);
                            } else {
                                echo "Error: " . mysqli_error($link);
                            }
                            mysqli_stmt_close($stmt3);

                            $stmt9 = mysqli_stmt_init($link);
                            $query = "SELECT id_registo FROM registos WHERE users_id_user = ? AND imagem_registo = ?";
                            if (mysqli_stmt_prepare($stmt9, $query)) {
                                mysqli_stmt_bind_param($stmt9, 'is', $_SESSION["id_utilizador"], $filename);
                                mysqli_stmt_execute($stmt9);
                                mysqli_stmt_bind_result($stmt, $id_registo);
                                mysqli_stmt_close($stmt9);
                            } else {
                                echo "Error: " . mysqli_error($link);
                            }
                            mysqli_stmt_close($stmt9);
                        }

                        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                        header("Location: ../planta_individual.php?id_registo=$id_registo");
                    } else {
                        $msg = 5;
                        header("Location: registar-planta.php?msg=" . $msg);
                    }
                } else {
                    $msg = 4;
                    header("Location: registar-planta.php?msg=" . $msg);
                }
            } else {
                $msg = 3;
                header("Location: registar-planta.php?msg=" . $msg);
            }
        } else {
            $msg = 2;
            header("Location: registar-planta.php?msg=" . $msg);
        }
        mysqli_close($link); // Close connection
    }
} else {
    $msg = 1;
    //header("Location: registar-planta.php?msg=" . $msg);
}
