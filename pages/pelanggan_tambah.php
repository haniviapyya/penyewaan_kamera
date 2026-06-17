<?php
include "../includes/config.php";
include "../includes/header.php";

if(isset($_POST['simpan'])){

    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    mysqli_query($conn,"
        INSERT INTO pelanggan
        (nama,alamat,no_hp,email)
        VALUES
        ('$nama','$alamat','$no_hp','$email')
    ");

    header("Location: pelanggan.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">➕ Tambah Pelanggan</h4>
</div>

<div class="card-body">

    <form method="post">

        <div class="mb-3">
            <label class="form-label">
                Nama Pelanggan
            </label>

            <input
                type="text"
                name="nama"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Alamat
            </label>

            <input
                type="text"
                name="alamat"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Nomor HP
            </label>

            <input
                type="text"
                name="no_hp"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
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
            href="pelanggan.php"
            class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</div>

<?php include "../includes/footer.php"; ?>