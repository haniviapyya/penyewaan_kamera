<?php

include "../includes/config.php";
include "../includes/header.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM kategori_kamera
    WHERE id_kategori='$id'"
);

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    mysqli_query($conn,"
    UPDATE kategori_kamera
    SET
        nama_kategori='$_POST[nama_kategori]'
    WHERE id_kategori='$id'
    ");

    header("Location:kategori.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">✏️ Edit Kategori Kamera</h4>
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
                value="<?= $row['nama_kategori']; ?>"
                required>

        </div>

        <button
            type="submit"
            name="update"
            class="btn btn-warning">

            Update

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