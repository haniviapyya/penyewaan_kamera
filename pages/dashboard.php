<?php

include "../includes/config.php";
include "../includes/header.php";

$total_pelanggan =
mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pelanggan"));

$total_kamera =
mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kamera"));

$total_sewa =
mysqli_num_rows(mysqli_query($conn,"SELECT * FROM penyewaan"));

?>

<h2 class="mb-4">Dashboard</h2>

<div class="row mb-4">

<div class="col-md-4">
    <div class="card shadow-sm bg-light border-start border-4 border-primary">
        <div class="card-body">
            <h2><?= $total_pelanggan ?></h2>
            <p class="text-muted mb-0">Total Pelanggan</p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card shadow-sm bg-light border-start border-4 border-success">
        <div class="card-body">
            <h2><?= $total_kamera ?></h2>
            <p class="text-muted mb-0">Total Kamera</p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card shadow-sm bg-light border-start border-4 border-secondary">
        <div class="card-body">
            <h2><?= $total_sewa ?></h2>
            <p class="text-muted mb-0">Total Penyewaan</p>
        </div>
    </div>
</div>

</div>

<div class="card shadow">
    <div class="card-header">
        Menu Utama
    </div>

<div class="card-body">

    <div class="row g-3">

<div class="col-md-4">
    <a href="pelanggan.php" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h5>👥 Pelanggan</h5>
                <small class="text-muted">
                    Kelola data pelanggan
                </small>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="kategori.php" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h5>📂 Kategori</h5>
                <small class="text-muted">
                    Kelola kategori kamera
                </small>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="kamera.php" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h5>📷 Kamera</h5>
                <small class="text-muted">
                    Kelola data kamera
                </small>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="penyewaan.php" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h5>📝 Penyewaan</h5>
                <small class="text-muted">
                    Kelola transaksi sewa
                </small>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="pembayaran.php" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h5>💳 Pembayaran</h5>
                <small class="text-muted">
                    Kelola pembayaran
                </small>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="laporan_penyewaan.php" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h5>📊 Laporan Penyewaan</h5>
                <small class="text-muted">
                    Lihat laporan penyewaan
                </small>
            </div>
        </div>
    </a>
</div>

<div class="col-md-4">
    <a href="laporan_pendapatan.php" class="text-decoration-none">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h5>💰 Pendapatan</h5>
                <small class="text-muted">
                    Laporan pendapatan
                </small>
            </div>
        </div>
    </a>
</div>

</div>


</div>

</div>


<?php include "../includes/footer.php"; ?>