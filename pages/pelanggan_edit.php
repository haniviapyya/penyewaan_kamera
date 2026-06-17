<?php

include "../includes/config.php";
include "../includes/header.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM pelanggan
    WHERE id_pelanggan='$id'"
);

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    mysqli_query($conn,"
        UPDATE pelanggan
        SET
        nama='$_POST[nama]',
        alamat='$_POST[alamat]',
        no_hp='$_POST[no_hp]',
        email='$_POST[email]'
        WHERE id_pelanggan='$id'
    ");

    header("Location: pelanggan.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">✏️ Edit Pelanggan</h4>
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
                value="<?= $row['nama']; ?>"
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
                value="<?= $row['alamat']; ?>"
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
                value="<?= $row['no_hp']; ?>"
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
                value="<?= $row['email']; ?>"
                required>

        </div>

        <button
            type="submit"
            name="update"
            class="btn btn-warning">

            Update

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