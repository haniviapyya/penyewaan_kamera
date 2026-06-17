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

<!-- HERO BANNER -->

<div class="hero-banner">

    <h1>📷 Sistem Penyewaan Kamera</h1>

    <p>
        Solusi penyewaan kamera DSLR, Mirrorless,
        Action Cam dan perlengkapan fotografi
        untuk kebutuhan event, travelling,
        content creator dan profesional.
    </p>

    <a href="kamera.php" class="btn btn-light btn-lg">
        Lihat Kamera
    </a>

</div>

<!-- STATISTIK -->

<h2 class="mb-4">Dashboard</h2>

<div class="alert alert-primary">
    🕒 Jam Sekarang:
    <span id="jam"></span>
</div>

<div class="row mb-5">

    <div class="col-md-4 mb-3">

        <div class="card statistik-1">

            <div class="card-body text-center">

                <h2>
                    <?= $total_pelanggan ?>
                </h2>

                <p class="text-muted mb-0">
                    Total Pelanggan
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card statistik-2">

            <div class="card-body text-center">

                <h2>
                    <?= $total_kamera ?>
                </h2>

                <p class="text-muted mb-0">
                    Total Kamera
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card statistik-3">

            <div class="card-body text-center">

                <h2>
                    <?= $total_sewa ?>
                </h2>

                <p class="text-muted mb-0">
                    Total Penyewaan
                </p>

            </div>

        </div>

    </div>

</div>

<!-- PRODUK PILIHAN -->

<h3 class="mb-4">📸 Produk Pilihan</h3>

<div class="row mb-5">

    <div class="col-md-3 mb-4">

        <div class="card">

            <img src="../assets/img/nikond7500.jpg"
                 class="card-img-top">

            <div class="card-body text-center">

                <h5>Nikon D7500</h5>

                <p class="text-muted">
                    Mulai dari Rp170.000 / 24 jam
                </p>

                <a href="kamera.php"
                   class="btn btn-primary btn-sm">
                    Lihat Detail
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <img src="../assets/img/fujifilmxt30.jpg"
                 class="card-img-top">

            <div class="card-body text-center">

                <h5>Fujifilm X-T30</h5>

                <p class="text-muted">
                    Mulai dari Rp180.000 / 24 jam
                </p>

                <a href="kamera.php"
                   class="btn btn-primary btn-sm">
                    Lihat Detail
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <img src="../assets/img/actioncam.jpg"
                 class="card-img-top">

            <div class="card-body text-center">

                <h5>Action Cam</h5>

                <p class="text-muted">
                    Cocok untuk travelling dan vlog
                </p>

                <a href="kamera.php"
                   class="btn btn-primary btn-sm">
                    Lihat Detail
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card">

            <img src="../assets/img/sonya6400.jpg"
                 class="card-img-top">

            <div class="card-body text-center">

                <h5>Sony A6400</h5>

                <p class="text-muted">
                    Kamera mirrorless favorit
                </p>

                <a href="kamera.php"
                   class="btn btn-primary btn-sm">
                    Lihat Detail
                </a>

            </div>

        </div>

    </div>

</div>

<!-- KATEGORI -->

<h3 class="mb-4">📂 Kategori Kamera</h3>

<div class="row mb-5">

    <div class="col-md-4 mb-4">

        <div class="card kategori-card">

            <img src="../assets/img/canoneos80d.jpg">

            <div class="card-body">

                <h5>DSLR</h5>

                <p class="text-muted">
                    Kamera profesional untuk
                    fotografi dan kebutuhan studio.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card kategori-card">

            <img src="../assets/img/fujifilmxt30.jpg">

            <div class="card-body">

                <h5>Mirrorless</h5>

                <p class="text-muted">
                    Ringan, modern dan cocok
                    untuk content creator.
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card kategori-card">

            <img src="../assets/img/actioncam.jpg">

            <div class="card-body">

                <h5>Action Cam</h5>

                <p class="text-muted">
                    Cocok untuk travelling,
                    olahraga dan vlog.
                </p>

            </div>

        </div>

    </div>

</div>

<!-- MENU UTAMA -->

<div class="card shadow mb-5">

    <div class="card-header">
        Menu Utama
    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-3">
                <a href="pelanggan.php"
                   class="btn btn-primary w-100">
                    👥 Pelanggan
                </a>
            </div>

            <div class="col-md-3">
                <a href="kategori.php"
                   class="btn btn-primary w-100">
                    📂 Kategori
                </a>
            </div>

            <div class="col-md-3">
                <a href="kamera.php"
                   class="btn btn-primary w-100">
                    📷 Kamera
                </a>
            </div>

            <div class="col-md-3">
                <a href="penyewaan.php"
                   class="btn btn-primary w-100">
                    📝 Penyewaan
                </a>
            </div>

            <div class="col-md-3">
                <a href="pembayaran.php"
                   class="btn btn-primary w-100">
                    💳 Pembayaran
                </a>
            </div>

            <div class="col-md-3">
                <a href="laporan_penyewaan.php"
                   class="btn btn-primary w-100">
                    📊 Laporan Penyewaan
                </a>
            </div>

            <div class="col-md-3">
                <a href="laporan_pendapatan.php"
                   class="btn btn-primary w-100">
                    💰 Pendapatan
                </a>
            </div>

        </div>

    </div>

</div>

<!-- INFORMASI -->

<div class="card">

    <div class="card-header">
        Informasi Rental Kamera
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <h5>Hubungi Kami</h5>

                <p>
                    📞 088980705251
                </p>

                <p>
                    📷 @kamera_rent
                </p>

                <p>
                    ⏰ 07.00 - 22.00 WIB
                </p>

            </div>

            <div class="col-md-6">

                <h5>Alamat</h5>

                <p>
                    Jl. Kahyangan No.210
                    Jawa Tengah
                </p>

            </div>

        </div>

    </div>

</div>

<?php include "../includes/footer.php"; ?>