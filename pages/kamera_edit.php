<?php

include "../includes/config.php";
include "../includes/header.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM kamera
     WHERE id_kamera='$id'"
);

$row = mysqli_fetch_assoc($data);

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM kategori_kamera"
);

if(isset($_POST['update'])){

    mysqli_query($conn,"
    UPDATE kamera
    SET
        id_kategori='$_POST[id_kategori]',
        nama_kamera='$_POST[nama_kamera]',
        harga_sewa='$_POST[harga_sewa]',
        stok='$_POST[stok]',
        status='$_POST[status]'
    WHERE id_kamera='$id'
    ");

    header("Location:kamera.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">✏️ Edit Kamera</h4>
</div>

<div class="card-body">

    <form method="post">

        <div class="mb-3">

            <label class="form-label">
                Kategori Kamera
            </label>

            <select
                name="id_kategori"
                class="form-select">

                <?php while($k=mysqli_fetch_assoc($kategori)){ ?>

                <option
                    value="<?= $k['id_kategori']; ?>"
                    <?= ($row['id_kategori']==$k['id_kategori']) ? 'selected' : '' ?>>

                    <?= $k['nama_kategori']; ?>

                </option>

                <?php } ?>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nama Kamera
            </label>

            <input
                type="text"
                name="nama_kamera"
                class="form-control"
                value="<?= $row['nama_kamera']; ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Harga Sewa
            </label>

            <input
                type="number"
                name="harga_sewa"
                class="form-control"
                value="<?= $row['harga_sewa']; ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Stok
            </label>

            <input
                type="number"
                name="stok"
                class="form-control"
                value="<?= $row['stok']; ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Status
            </label>

            <select
                name="status"
                class="form-select">

                <option
                    value="Tersedia"
                    <?= ($row['status']=='Tersedia') ? 'selected' : '' ?>>
                    Tersedia
                </option>

                <option
                    value="Tidak Tersedia"
                    <?= ($row['status']=='Tidak Tersedia') ? 'selected' : '' ?>>
                    Tidak Tersedia
                </option>

            </select>

        </div>

        <button
            type="submit"
            name="update"
            class="btn btn-warning">

            Update

        </button>

        <a
            href="kamera.php"
            class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</div>

<?php include "../includes/footer.php"; ?>