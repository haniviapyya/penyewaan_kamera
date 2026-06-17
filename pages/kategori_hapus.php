<?php

include "../includes/config.php";

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM kategori_kamera
    WHERE id_kategori='$id'"
);

header("Location:kategori.php");