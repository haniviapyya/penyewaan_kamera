<?php

session_start();

if (!isset($_SESSION['login'])) {

    header("Location: /penyewaan_kamera/pages/login.php");
    exit;

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sistem Penyewaan Kamera</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="/penyewaan_kamera/assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

<div class="container">

<a class="navbar-brand fw-bold" href="/penyewaan_kamera">

<i class="fa-solid fa-camera"></i>
KameraRent

</a>

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="/penyewaan_kamera">
Home
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/penyewaan_kamera/pages/kamera.php">
Kamera
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/penyewaan_kamera/pages/penyewaan.php">
Penyewaan
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/penyewaan_kamera/pages/pembayaran.php">
Pembayaran
</a>
</li>

<li class="nav-item">
    <a class="nav-link text-warning"
       href="/penyewaan_kamera/pages/logout.php">
       Logout
    </a>
</li>

</ul>

</div>

</div>

</nav>

<div class="container mt-4">