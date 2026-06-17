<?php

include "../includes/config.php";

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM penyewaan
    WHERE id_sewa='$id'"
);

header("Location: penyewaan.php");