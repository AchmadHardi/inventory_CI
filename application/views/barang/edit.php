<!-- Form to edit an existing barang -->
<form id="formEdit" action="<?= base_url('barang/update'); ?>" method="post">
    <input type="hidden" name="id" value="<?= $barang->id_barang; ?>">
    <div class="form-group">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
            value="<?= $barang->nama_barang; ?>">
    </div>
    <div class="form-group">
        <label for="stok">Stok:</label>
        <input type="text" class="form-control" id="stok" name="stok" value="<?= $barang->stok; ?>">
    </div>
    <div class="form-group">
        <label for="kategori">Kategori:</label>
        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $barang->nama_kategori; ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>