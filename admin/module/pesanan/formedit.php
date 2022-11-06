<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$invoice = $_GET['invoice'];
$QueryItems = mysqli_query($koneksi, "SELECT do.invoice as invoice, o.status_order as status FROM tbl_detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order WHERE do.invoice = '$invoice'");
$rowItems = mysqli_fetch_array($QueryItems);
if ($rowItems['status'] == 'P') {
    $status = 'Proses';
} elseif ($rowItems['status'] == 'K') {
    $status = 'Kirim';
} elseif ($rowItems['status'] == 'S') {
    $status = 'Selesai';
}
$inv = $rowItems['invoice']; 
?>

<!-- Main Content -->
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Edit pesanan</h4>
                        <div class="card-header-action">
                            <a href="adminweb.php?module=Pesanan" class="btn btn-danger">Kembali ke data pesanan<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="../admin/module/pesanan/aksiedit.php" method="POST">
                            <div class="form-group">
                                <label for="invoice" class="col-sm-2 control-label">Invoice</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $inv; ?>" disabled>
                                    <input type="hidden" class="form-control" name="invoice" value="<?= $inv; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Pesanan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status">
                                        <option value="<?= $rowItems['status_order']; ?>"><?= $status; ?></option>
                                        <option value="P">Sedang DiProses</option>
                                        <option value="K">Sedang DiKirim</option>
                                        <option value="S">Pesanan Sudah Selesai</option>
                                    </select>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>