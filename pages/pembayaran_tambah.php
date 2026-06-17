<?php

include "../includes/config.php";
include "../includes/header.php";

$sewa = mysqli_query(
    $conn,
    "SELECT * FROM penyewaan"
);

if(isset($_POST['simpan'])){

    mysqli_query($conn,"
    INSERT INTO pembayaran
    (
        id_sewa,
        tanggal_bayar,
        metode_bayar,
        nominal
    )
    VALUES
    (
        '$_POST[id_sewa]',
        '$_POST[tanggal_bayar]',
        '$_POST[metode_bayar]',
        '$_POST[nominal]'
    )
    ");

    header("Location:pembayaran.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">💳 Tambah Pembayaran</h4>
</div>

<div class="card-body">

    <form method="post">

        <div class="mb-3">

            <label class="form-label">
                ID Penyewaan
            </label>

            <select
                name="id_sewa"
                class="form-select">

                <?php while($s=mysqli_fetch_assoc($sewa)){ ?>

                <option value="<?= $s['id_sewa']; ?>">
                    Penyewaan #<?= $s['id_sewa']; ?>
                </option>

                <?php } ?>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Tanggal Bayar
            </label>

            <input
                type="date"
                name="tanggal_bayar"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Metode Pembayaran
            </label>

            <select
                name="metode_bayar"
                class="form-select">

                <option>Cash</option>
                <option>Transfer Bank</option>
                <option>E-Wallet</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nominal Pembayaran
            </label>

            <input
                type="number"
                name="nominal"
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
            href="pembayaran.php"
            class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</div>

<?php include "../includes/footer.php"; ?>