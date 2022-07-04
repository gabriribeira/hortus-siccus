<?php

if($_SESSION["role"] < 2){
    header("Location: ../code/feed.php");
}