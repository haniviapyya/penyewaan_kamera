<?php
include "../includes/config.php";
include "../includes/header.php";

$data = mysqli_query(
    $conn,
    "SELECT * FROM view_laporan_pendapatan"
);
?>

<div class="card shadow-sm mb-4">

<div class="card-body">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h3 class="mb-0">💰 Laporan Pendapatan</h3>
            <small class="text-muted">
                Ringkasan total pendapatan penyewaan
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
                    <th>Bulan</th>
                    <th>Total Pendapatan</th>
                </tr>

            </thead>

            <tbody>

            <?php while($row=mysqli_fetch_assoc($data)){ ?>

            <tr>

                <td><?= $row['bulan']; ?></td>

                <td>
                    Rp <?= number_format($row['total_pendapatan']); ?>
                </td>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</div>

<?php include "../includes/footer.php"; ?>