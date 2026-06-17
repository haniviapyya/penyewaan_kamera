<?php

include "../includes/config.php";
include "../includes/header.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM penyewaan
    WHERE id_sewa='$id'"
);

$row = mysqli_fetch_assoc($data);

$pelanggan = mysqli_query(
    $conn,
    "SELECT * FROM pelanggan"
);

if(isset($_POST['update'])){

    mysqli_query($conn,"
    UPDATE penyewaan
    SET
        id_pelanggan='$_POST[id_pelanggan]',
        tanggal_sewa='$_POST[tanggal_sewa]',
        tanggal_kembali='$_POST[tanggal_kembali]',
        total_biaya='$_POST[total_biaya]',
        status='$_POST[status]'
    WHERE id_sewa='$id'
    ");

    header("Location: penyewaan.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">✏️ Edit Penyewaan</h4>
</div>

<div class="card-body">

    <form method="post">

        <div class="mb-3">

            <label class="form-label">
                Pelanggan
            </label>

            <select
                name="id_pelanggan"
                class="form-select">

                <?php while($p=mysqli_fetch_assoc($pelanggan)){ ?>

                <option
                    value="<?= $p['id_pelanggan']; ?>"
                    <?= ($row['id_pelanggan']==$p['id_pelanggan']) ? 'selected' : '' ?>>

                    <?= $p['nama']; ?>

                </option>

                <?php } ?>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Tanggal Sewa
            </label>

            <input
                type="date"
                name="tanggal_sewa"
                class="form-control"
                value="<?= $row['tanggal_sewa']; ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Tanggal Kembali
            </label>

            <input
                type="date"
                name="tanggal_kembali"
                class="form-control"
                value="<?= $row['tanggal_kembali']; ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Total Biaya
            </label>

            <input
                type="number"
                name="total_biaya"
                class="form-control"
                value="<?= $row['total_biaya']; ?>"
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
                    value="Dipinjam"
                    <?= ($row['status']=='Dipinjam') ? 'selected' : '' ?>>
                    Dipinjam
                </option>

                <option
                    value="Selesai"
                    <?= ($row['status']=='Selesai') ? 'selected' : '' ?>>
                    Selesai
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
            href="penyewaan.php"
            class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</div>

<?php include "../includes/footer.php"; ?>