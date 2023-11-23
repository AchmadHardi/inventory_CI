<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Tambah Data</i>
            </button>

        </div>
        <div class="card-body mt-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    // open foreach
                    foreach ($barang as $item) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $item->nama_barang ?></td>
                        <td><?php echo $item->stok ?></td>
                        <td class="d-flex align-items-center">
                            <div class="mr-2">
                                <button type="button" data-toggle="modal" class="btn btn-sm btn-warning btn-edit"
                                    data-target="#modalUbah<?= $item->id_barang ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </div>

                            <form id="form-delete-<?= $item->id_barang ?>" method="post"
                                action="<?= site_url('barang/hapus/' . $item->id_barang); ?>">
                                <button type="button" class="btn btn-sm btn-danger btn-confirm-delete"
                                    data-id="<?= $item->id_barang ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Your Modal -->
                    <div class="modal fade" id="modalUbah<?= $item->id_barang ?>" tabindex="-1" role="dialog"
                        aria-labelledby="modalUbahLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalUbahLabel">Edit Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="<?= base_url('barang/update/') ?>">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" id="id_barang" name="id_barang"
                                            value="<?= $item->id_barang; ?>">
                                        <label for="editNamaBarang">Nama Barang:</label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                            value="<?= $item->nama_barang; ?>">

                                        <label for="editStok" class="mt-3">Stok:</label>
                                        <!-- <input type="text" class="form-control" id="stok" name="stok"
                                            value="<?= $item->stok; ?>"> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="btnSaveChanges">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- end foreach -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('barang/tambah') ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="nama_barang"></label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                            placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group mb-0">
                        <label for="stok"></label>
                        <!-- <input type="text" name="stok" id="stok" class="form-control" placeholder="Masukkan stok"> -->
                    </div>
                    <!-- <div class="form-group mb-0">
                        <label for="kategori"></label>
                        <input type="text" name="kategori" id="tambah-kategori" class="form-control"
                            placeholder="Masukkan kategori">
                    </div> -->
                    <!-- contoh -->
                    <!-- <select class="form-control" name="id_kategori" id="id_kategori">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {

    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        var nama_barang = $(this).data('nama_barang');
        var stok = $(this).data('stok');

        $('#editNamaBarang').val(nama_barang);
        $('#editStok').val(stok);

        $('#modalUbah').modal('show');
    });
});
</script>

<script>
$('body').on('click', '.btn-confirm-delete', function() {
    var id = $(this).data('id');

    if (confirm("Yakin ingin menghapus data barang?")) {
        // Use the form ID to submit the form
        $('#form-delete-' + id).submit();
    }
});
</script>