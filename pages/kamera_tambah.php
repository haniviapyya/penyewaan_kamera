<?php

include "../includes/config.php";
include "../includes/header.php";

if (isset($_POST['simpan'])) {

    mysqli_query($conn, "
    INSERT INTO kamera
    (
        id_kategori,
        nama_kamera,
        harga_sewa,
        stok,
        status
    )
    VALUES
    (
        '$_POST[id_kategori]',
        '$_POST[nama_kamera]',
        '$_POST[harga_sewa]',
        '$_POST[stok]',
        '$_POST[status]'
    )
    ");

    header("Location:kamera.php");
}

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM kategori_kamera"
);
?>

<div class="card shadow-sm">

    <div class="card-header">
        <h4 class="mb-0">📷 Tambah Kamera</h4>
    </div>

    <div class="card-body">

        <form method="post" id="formKamera">

            <div class="mb-3">

                <label class="form-label">
                    Kategori Kamera
                </label>

                <select name="id_kategori" class="form-select">

                    <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>

                        <option value="<?= $k['id_kategori']; ?>">
                            <?= $k['nama_kategori']; ?>
                        </option>

                    <?php } ?>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nama Kamera
                </label>

                <input type="text" name="nama_kamera" id="nama_kamera" class="form-control" required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Harga Sewa
                </label>

                <input type="number" name="harga_sewa" id="harga_sewa" class="form-control" required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Stok
                </label>

                <input type="number" name="stok" id="stok" class="form-control" required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select name="status" class="form-select">

                    <option value="Tersedia">
                        Tersedia
                    </option>

                    <option value="Tidak Tersedia">
                        Tidak Tersedia
                    </option>

                </select>

            </div>

            <button type="submit" name="simpan" class="btn btn-success">

                Simpan

            </button>

            <a href="kamera.php" class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

<?php include "../includes/footer.php"; ?>