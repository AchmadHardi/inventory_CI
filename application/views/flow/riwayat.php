<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <h3><?= $judul ?></h3>
        </div>
        <div class="card-body mt-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Flow</th>
                        <th>Nama Barang</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Stok Sebelumnya</th>
                        <th class="text-center">Stok Setelahnya</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($stockflow as $item) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $item->flow ?></td>
                            <td><?php echo $item->nama_barang ?></td>
                            <td class="text-center"><?php echo $item->qty ?></td>
                            <td class="text-center"><?php echo $item->stock_before ?></td>
                            <td class="text-center"><?php echo $item->stock_after ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
