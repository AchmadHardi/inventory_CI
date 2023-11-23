<!-- Form to create a new barang -->
<form id="formCreate" action="<?= base_url('barang/create'); ?>" method="post">
    <div class="form-group">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
    </div>
    <div class="form-group">
        <label for="stok">Stok:</label>
        <input type="text" class="form-control" id="stok" name="stok">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>