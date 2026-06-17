<?php
include "../includes/config.php";
include "../includes/header.php";

$data = mysqli_query($conn,"SELECT * FROM kategori_kamera");
?>

<div class="card shadow-sm mb-4">

<div class="card-body">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-0">📂 Data Kategori Kamera</h3>
            <small class="text-muted">
                Kelola kategori kamera
            </small>
        </div>

        <a href="kategori_tambah.php"
           class="btn btn-primary">

           + Tambah Kategori

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
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row=mysqli_fetch_assoc($data)){ ?>

            <tr>

                <td><?= $row['id_kategori']; ?></td>

                <td><?= $row['nama_kategori']; ?></td>

                <td class="text-nowrap">

                    <a
                        href="kategori_edit.php?id=<?= $row['id_kategori']; ?>"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a
                        href="kategori_hapus.php?id=<?= $row['id_kategori']; ?>"
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