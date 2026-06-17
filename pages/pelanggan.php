<?php
include "../includes/config.php";
include "../includes/header.php";

$data = mysqli_query($conn, "SELECT * FROM pelanggan");
?>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h3 class="mb-0">👥 Data Pelanggan</h3>
                <small class="text-muted">
                    Kelola data pelanggan
                </small>
            </div>

            <a href="pelanggan_tambah.php" class="btn btn-primary">
                + Tambah Pelanggan
            </a>

        </div>

    </div>
</div>

<div class="card shadow-sm">

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                        <tr>
                            <td><?= $row['id_pelanggan']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['no_hp']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td>
                                <a href="pelanggan_edit.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <a href="pelanggan_hapus.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')">

                                    Hapus

                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                </table>

            </div>

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