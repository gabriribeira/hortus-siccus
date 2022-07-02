<?php

session_start();

require_once("../connections/connection.php"); // We need the function!
$link = new_db_connection(); // Create a new DB connection
$stmt = mysqli_stmt_init($link); // create a prepared statement

if (isset($_POST["bio"]) && $_FILES["fileToUpload"]["name"] != "") {

    $query = "SELECT id_user, username, roles_id_role, nome_user FROM users WHERE username = ?";

    if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
        mysqli_stmt_bind_param($stmt, 's', $_POST["username"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_user, $username, $role, $nome_user);
        if (!mysqli_stmt_fetch($stmt)) { // Execute the prepared statement
            $msg = 6;
            header("Location: ../registo2.php?msg=" . $msg);
        } else {
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

                            $query = "UPDATE users SET imagem_user = ?, descricao = ? WHERE id_user = ?"; // Define the query
                            
                            if (mysqli_stmt_prepare($stmt, $query)) { // Prepare the statement
                                mysqli_stmt_bind_param($stmt, 'sss', $filename, $_POST["bio"], $id_user);
                                if (mysqli_stmt_execute($stmt)) { // Execute the prepared statement
                                    $_SESSION["username"] = $username;
                                    $_SESSION["id_utilizador"] = $id_user;
                                    $_SESSION["nome_utilizador"] = $nome_user;
                                    $_SESSION["imagem_utilizador"] = $filename;
                                    $_SESSION["role"] = $role;
                                } else {
                                    mysqli_stmt_error($stmt);
                                    $msg = 3;
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
                $msg = 7;
                header("Location: ../registo2.php?msg=" . $msg);
            }
        }
    } else {
        $msg = 3;
        header("Location: ../registo2.php?msg=" . $msg);
    }
} else {
    $msg = 4;
    header("Location: ../registo2.php?msg=" . $msg);
}
