<?php

include "../includes/config.php";
include "../includes/header.php";

$pelanggan = mysqli_query(
    $conn,
    "SELECT * FROM pelanggan"
);

if(isset($_POST['simpan'])){

    mysqli_query($conn,"
    INSERT INTO penyewaan
    (
        id_pelanggan,
        tanggal_sewa,
        tanggal_kembali,
        total_biaya,
        status
    )
    VALUES
    (
        '$_POST[id_pelanggan]',
        '$_POST[tanggal_sewa]',
        '$_POST[tanggal_kembali]',
        '$_POST[total_biaya]',
        '$_POST[status]'
    )
    ");

    header("Location: penyewaan.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">📝 Tambah Penyewaan</h4>
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

                <option value="<?= $p['id_pelanggan']; ?>">
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
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Status
            </label>

            <select
                name="status"
                class="form-select">

                <option value="Dipinjam">
                    Dipinjam
                </option>

                <option value="Selesai">
                    Selesai
                </option>

            </select>

        </div>

        <button
            type="submit"
            name="simpan"
            class="btn btn-success">

            Simpan

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