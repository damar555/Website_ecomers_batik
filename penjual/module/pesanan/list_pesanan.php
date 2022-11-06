<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manajemen Pesanan</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Nama Pembeli</th>
                                        <th>Tanggal</th>
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $QueryCart = mysqli_query(
                                        $koneksi,
                                        "SELECT DISTINCT o.invoice AS invoice, o.total AS total,r.status_order AS statusorder, p.nama_penjual AS namaPenjual, o.tanggal AS tanggal FROM tbl_detail_order o, tbl_penjual p, tbl_order r WHERE o.id_detai_order = o.id_detai_order AND o.id_penjual = p.id_penjual AND o.id_order = r.id_order "
                                    );
                                    while ($row = mysqli_fetch_array($QueryCart)) {
                                    ?>
                                        <tr>
                                            <td>INV-<?= $row['invoice']; ?></td>
                                            <td>Rp <?= number_format($row['total']); ?></td>
                                            <td>
                                                <?php
                                                $invoice = $row['invoice'];
                                                $QueryItems = mysqli_query($koneksi, "SELECT DISTINCT status_order FROM tbl_detail_order do INNER JOIN tbl_order o ON do.id_order = o.id_order INNER JOIN produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");;
                                                $rowItems = mysqli_fetch_array($QueryItems);
                                                if ($rowItems['status_order'] == 'P') {
                                                    $status = 'Proses';
                                                } elseif ($rowItems['status_order'] == 'K') {
                                                    $status = 'Kirim';
                                                } elseif ($rowItems['status_order'] == 'S') {
                                                    $status = 'Selesai';
                                                }
                                                echo $status;
                                                ?>
                                            </td>
                                            <td><?= $row['namaPenjual']; ?></td>
                                            <td><?= $row['tanggal']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-warning" href="<?= $admin_url; ?>adminweb.php?module=edit_pesanan&invoice=<?= $row['invoice']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>