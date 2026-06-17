<?php

include "../includes/config.php";
include "../includes/header.php";

if(isset($_POST['simpan'])){

    mysqli_query($conn,"
    INSERT INTO kategori_kamera
    (
        nama_kategori
    )
    VALUES
    (
        '$_POST[nama_kategori]'
    )
    ");

    header("Location:kategori.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">📂 Tambah Kategori Kamera</h4>
</div>

<div class="card-body">

    <form method="post">

        <div class="mb-3">

            <label class="form-label">
                Nama Kategori
            </label>

            <input
                type="text"
                name="nama_kategori"
                class="form-control"
                required>

        </div>

        <button
            type="submit"
            name="simpan"
            class="btn btn-success">

            Simpan

        </button>

        <a
            href="kategori.php"
            class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</div>

<?php include "../includes/footer.php"; ?>