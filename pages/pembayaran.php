<?php
include "../includes/config.php";
include "../includes/header.php";

$data = mysqli_query($conn,"
SELECT p.*, s.id_sewa
FROM pembayaran p
JOIN penyewaan s
ON p.id_sewa = s.id_sewa
");
?>

<div class="card shadow-sm mb-4">

<div class="card-body">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-0">💳 Data Pembayaran</h3>
            <small class="text-muted">
                Kelola data pembayaran penyewaan
            </small>
        </div>

        <a href="pembayaran_tambah.php"
           class="btn btn-primary">

           + Tambah Pembayaran

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
                    <th>ID Pembayaran</th>
                    <th>ID Sewa</th>
                    <th>Tanggal Bayar</th>
                    <th>Metode Bayar</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row=mysqli_fetch_assoc($data)){ ?>

            <tr>

                <td><?= $row['id_pembayaran']; ?></td>

                <td>#<?= $row['id_sewa']; ?></td>

                <td><?= $row['tanggal_bayar']; ?></td>

                <td>

                    <span class="badge bg-info text-dark">
                        <?= $row['metode_bayar']; ?>
                    </span>

                </td>

                <td>
                    Rp <?= number_format($row['nominal']); ?>
                </td>

                <td class="text-nowrap">

                    <a
                        href="pembayaran_edit.php?id=<?= $row['id_pembayaran']; ?>"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a
                        href="pembayaran_hapus.php?id=<?= $row['id_pembayaran']; ?>"
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