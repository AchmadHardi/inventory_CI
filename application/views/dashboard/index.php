<div class="container-fluid">
    <div class="col-md-6 col-xs-12">
        <div class="card mt-2">
            <div class="card-header">
                <h3><?= $judul ?></h3>
            </div>
            <div class="card-body mt-2">

                <form id="formCreate" action="<?= base_url(); ?>flow/store?flow=keluar" method="post">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang:</label>
                        <select name="id_barang" class="form-control" required>
                            <?php foreach ($barang as $b): ?>
                            <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?> <span><i>(Sisa stok Saat ini:
                                        <?= $b->stok ?>)</i></span></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Stok Keluar </label>
                        <input type="number" class="form-control" id="qty" name="qty" required min="1">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>