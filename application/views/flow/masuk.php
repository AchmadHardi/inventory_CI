<div class="container-fluid">
    <div class="col-md-6 col-xs-12">
        <div class="card mt-2">
            <div class="card-header">
                <h3><?= $judul ?></h3>
            </div>
            <div class="card-body mt-2">

                <form id="formCreate" action="<?= base_url(); ?>flow/store?flow=masuk" method="post" id="formTambah">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang:</label>
                        <select name="id_barang" class="form-control" required>
                            <?php foreach ($barang as $b) : ?>
                            <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?></option>
                            <?php endforeach ?>
                        </select>
                        <br>
                        <label for="nama_kategori">Nama Kategori: </label>
                        <select name="id_kategori" class="form-control" required>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Stok Masuk</label>
                        <input type="number" class="form-control" id="qty" name="qty" required min="1">
                    </div>
                    <a id="btnTambahData" class="btn btn-primary btn-tambah">Tambah Data</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function() {
    $('#btnTambahData').on('click', function(e) {
        e.preventDefault(); // Prevent the default behavior of the anchor

        $.ajax({
            url: $('#formCreate').attr('action'),
            method: 'POST',
            data: $('#formCreate').serialize(),
            success: function(response) {
                $('#modalTambah').modal('hide');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data berhasil ditambahkan!',
                    showConfirmButton: false,
                    timer: 1500
                });
                location.href = "riwayat";
            },
            error: function() {
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to add data. Please try again.',
                    icon: 'error'
                });
            }
        });
    });
});
</script>