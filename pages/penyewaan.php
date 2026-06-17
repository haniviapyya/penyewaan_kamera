<?php
include "../includes/config.php";
include "../includes/header.php";

$data = mysqli_query($conn,"
SELECT s.*, p.nama
FROM penyewaan s
JOIN pelanggan p
ON s.id_pelanggan = p.id_pelanggan
");
?>

<div class="card shadow-sm mb-4">

<div class="card-body">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-0">📝 Data Penyewaan</h3>
            <small class="text-muted">
                Kelola transaksi penyewaan kamera
            </small>
        </div>

        <a href="penyewaan_tambah.php"
           class="btn btn-primary">

           + Tambah Penyewaan

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
                    <th>Pelanggan</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Total Biaya</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($data)){ ?>

            <tr>

                <td><?= $row['id_sewa']; ?></td>

                <td><?= $row['nama']; ?></td>

                <td><?= $row['tanggal_sewa']; ?></td>

                <td><?= $row['tanggal_kembali']; ?></td>

                <td>
                    Rp <?= number_format($row['total_biaya']); ?>
                </td>

                <td>

                    <?php if($row['status'] == 'Dipinjam'){ ?>

                        <span class="badge bg-warning text-dark">
                            Dipinjam
                        </span>

                    <?php } else { ?>

                        <span class="badge bg-success">
                            Selesai
                        </span>

                    <?php } ?>

                </td>

                <td class="text-nowrap">

                    <a
                        href="penyewaan_edit.php?id=<?= $row['id_sewa']; ?>"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a
                        href="penyewaan_hapus.php?id=<?= $row['id_sewa']; ?>"
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