<?php

include "../includes/config.php";

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM kamera
    WHERE id_kamera='$id'"
);

header("Location:kamera.php");