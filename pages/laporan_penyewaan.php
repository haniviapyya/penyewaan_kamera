<?php
include "../includes/config.php";
include "../includes/header.php";

$data = mysqli_query(
    $conn,
    "SELECT * FROM view_data_penyewaan"
);
?>

<div class="card shadow-sm mb-4">

<div class="card-body">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-0">📊 Laporan Penyewaan</h3>
            <small class="text-muted">
                Data seluruh transaksi penyewaan kamera
            </small>
        </div>

        <button
            onclick="window.print()"
            class="btn btn-success">

            🖨 Cetak

        </button>

    </div>

</div>

</div>

<div class="card shadow-sm">

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Kamera</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Subtotal</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row=mysqli_fetch_assoc($data)){ ?>

            <tr>

                <td><?= $row['nama']; ?></td>

                <td><?= $row['nama_kamera']; ?></td>

                <td><?= $row['tanggal_sewa']; ?></td>

                <td><?= $row['tanggal_kembali']; ?></td>

                <td>
                    Rp <?= number_format($row['subtotal']); ?>
                </td>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</div>

<?php include "../includes/footer.php"; ?>