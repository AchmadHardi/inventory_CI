<div class="container-fluid">
    <div class="col-md-6 col-xs-12">
        <div class="card mt-2">
            <div class="card-header">
                <h3><?= $judul ?></h3>
            </div>
            <div class="card-body mt-2">
                <form action="<?= base_url('flow/store?flow=keluar'); ?>" method="post" id="formCreate">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang:</label>
						<select name="id_barang" class="form-control" required id="create-id_barang">
                            <?php foreach ($barang as $b) : ?>
                            <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?> <span><i>(Sisa stok Saat ini:
                                        <?= $b->stok ?>)</i></span></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori:</label>
                        <select name="id_kategori" class="form-control" required id="create-id_kategori">
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Stok Keluar </label>
						<input type="number" class="form-control" id="create-qty" name="qty" required min="1">
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
    $(document).ready(function () {
        $('#btnTambahData').on('click', function () {
            const data = {
                "id_barang": $('#create-id_barang').val(),
                "id_kategori": $('#create-id_kategori').val(),
                "qty": $('#create-qty').val(),
            };
            $.ajax({
                url: "<?= base_url('flow/store?flow=keluar'); ?>",
                method: 'POST',
                data: data,
                success: function (response) {
                    var responseData = JSON.parse(response);

                    // Check the status from the response
                    if (responseData.status === 'success') {
                        // Show success SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: responseData.message,
                            timer: 2000,
                            showConfirmButton: false,
                        }).then(function () {
                            // Redirect to the riwayat page
							window.location.href = "riwayat";
                        });
                    } else {
                        // Show error SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: responseData.message,
                        });
                    }
                },
                error: function () {
                    // Show generic error SweetAlert
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to add data. Please try again.',
                        icon: 'error',
                    });
                }
            });
        });
    });
</script>
