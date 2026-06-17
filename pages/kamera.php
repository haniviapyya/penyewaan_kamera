<?php
include "../includes/config.php";
include "../includes/header.php";

$data = mysqli_query($conn,"
SELECT k.*, kk.nama_kategori
FROM kamera k
JOIN kategori_kamera kk
ON k.id_kategori = kk.id_kategori
");
?>

<div class="card shadow-sm mb-4">
    <div class="card-body">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-0">📷 Data Kamera</h3>
            <small class="text-muted">
                Kelola data kamera
            </small>
        </div>

        <a href="kamera_tambah.php" class="btn btn-primary">
            + Tambah Kamera
        </a>
        

    </div>

</div>

</div>


<div class="card shadow-sm">

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Nama Kamera</th>
                    <th>Harga Sewa</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row=mysqli_fetch_assoc($data)){ ?>

            <tr>

                <td><?= $row['id_kamera']; ?></td>

                <td><?= $row['nama_kategori']; ?></td>

                <td><?= $row['nama_kamera']; ?></td>

                <td>
                    Rp <?= number_format($row['harga_sewa']); ?>
                </td>

                <td><?= $row['stok']; ?></td>

                <td>

                    <?php if($row['status'] == 'Tersedia'){ ?>

                        <span class="badge bg-success">
                            Tersedia
                        </span>

                    <?php } else { ?>

                        <span class="badge bg-danger">
                            Tidak Tersedia
                        </span>

                    <?php } ?>

                </td>

                <td class="text-nowrap">

                    <a
                        href="kamera_edit.php?id=<?= $row['id_kamera']; ?>"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a
                        href="kamera_hapus.php?id=<?= $row['id_kamera']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus data?')">

                        Hapus

                    </a>

                </td>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</div>


<div class="mt-4">
    <a href="../index.php"
       class="btn btn-secondary">

       ← Kembali

    </a>
</div>

<?php include "../includes/footer.php"; ?>