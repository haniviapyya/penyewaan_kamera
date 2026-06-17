<?php

include "../includes/config.php";

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM pembayaran
    WHERE id_pembayaran='$id'"
);

header("Location:pembayaran.php");