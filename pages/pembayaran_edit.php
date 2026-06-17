<?php

include "../includes/config.php";
include "../includes/header.php";

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM pembayaran
    WHERE id_pembayaran='$id'"
);

$row = mysqli_fetch_assoc($data);

$sewa = mysqli_query(
    $conn,
    "SELECT * FROM penyewaan"
);

if(isset($_POST['update'])){

    mysqli_query($conn,"
    UPDATE pembayaran
    SET
        id_sewa='$_POST[id_sewa]',
        tanggal_bayar='$_POST[tanggal_bayar]',
        metode_bayar='$_POST[metode_bayar]',
        nominal='$_POST[nominal]'
    WHERE id_pembayaran='$id'
    ");

    header("Location:pembayaran.php");
}
?>

<div class="card shadow-sm">

<div class="card-header">
    <h4 class="mb-0">✏️ Edit Pembayaran</h4>
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

                <option
                    value="<?= $s['id_sewa']; ?>"
                    <?= ($row['id_sewa']==$s['id_sewa']) ? 'selected' : '' ?>>

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
                value="<?= $row['tanggal_bayar']; ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Metode Pembayaran
            </label>

            <select
                name="metode_bayar"
                class="form-select">

                <option
                    value="Cash"
                    <?= ($row['metode_bayar']=='Cash') ? 'selected' : '' ?>>
                    Cash
                </option>

                <option
                    value="Transfer Bank"
                    <?= ($row['metode_bayar']=='Transfer Bank') ? 'selected' : '' ?>>
                    Transfer Bank
                </option>

                <option
                    value="E-Wallet"
                    <?= ($row['metode_bayar']=='E-Wallet') ? 'selected' : '' ?>>
                    E-Wallet
                </option>

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
                value="<?= $row['nominal']; ?>"
                required>

        </div>

        <button
            type="submit"
            name="update"
            class="btn btn-warning">

            Update

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