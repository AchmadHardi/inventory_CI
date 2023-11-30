<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Tambah Data</i>
            </button>

        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            // open foreach
                            foreach ($kategori as $index => $item) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $item->nama_kategori ?></td>
                                <td class="d-flex align-items-center">
                                    <div class="mr-2">
                                        <button type="button" data-toggle="modal"
                                            class="btn btn-sm btn-warning btn-edit"
                                            data-target="#modalUbah<?= $item->id_kategori ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>

                                    <form id="form-delete-<?= $item->id_kategori ?>" method="post"
                                        action="<?= site_url('kategori/hapus/' . $item->id_kategori); ?>">
                                        <button type="button" class="btn btn-sm btn-danger btn-confirm-delete"
                                            data-id="<?= $item->id_kategori ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Your Modal -->
                            <div class="modal fade" id="modalUbah<?= $item->id_kategori ?>" tabindex="-1" role="dialog"
                                aria-labelledby="modalUbahLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalUbahLabel">Edit Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="<?= base_url('kategori/update/') ?>">
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" id="id_kategori"
                                                    name="id_kategori" value="<?= $item->id_kategori; ?>">
                                                <label for="editNamakategori">Nama kategori:</label>
                                                <input type="text" class="form-control" id="nama_kategori"
                                                    name="nama_kategori" value="<?= $item->nama_kategori; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary btn-update"
                                                    id="btnSaveChanges">Save
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
                        <h5 class="modal-title">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('kategori/tambah') ?>" method="post" id="formTambah">
                            <div class="form-group mb-0">
                                <label for="nama_kategori"></label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                    placeholder="Masukkan Nama kategori">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a id="btnTambahData" class="btn btn-primary btn-tambah">Tambah
                            Data</a>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

        <script>
        $(document).ready(function() {
            $('#btnTambahData').on('click', function() {
                $.ajax({
                    url: $('#formTambah').attr('action'),
                    method: 'POST',
                    data: $('#formTambah').serialize(),
                    success: function(response) {
                        $('#modalTambah').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil ditambahkan!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload()
                    },
                    error: function() {
                        // Show SweetAlert for error
                        Swal.fire({
                            title: 'Error',
                            text: 'Failed to add data. Please try again.',
                            icon: 'error'
                        });
                    }
                });
            });
        });


        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                var id = $(this).data('id');
                var nama_kategori = $(this).data('nama_kategori');
                var stok = $(this).data('stok');

                var modalId = '#modalUbah' + id;

                $(modalId + ' #editNamakategori').val(nama_kategori);
                $(modalId + ' #editStok').val(stok);

                $(modalId).modal('show');
            });

            $('body').on('click', '.btn-confirm-delete', function() {
                var id = $(this).data('id');

                // Use SweetAlert2 for confirmation
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Yakin ingin menghapus data kategori?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Use the form ID to submit the form
                        $('#form-delete-' + id).submit();

                        // Show SweetAlert for success
                        Swal.fire({
                            title: 'Success',
                            text: 'Data berhasil dihapus!',
                            icon: 'success',
                            timer: 1500
                        });
                    }
                });
            });

            $('body').on('click', '.btn-update', function() {
                // Perform an AJAX form submission
                $.ajax({
                    url: $('#formUbah').attr('action'),
                    method: 'POST',
                    data: $('#formUbah').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        // if (response.success) {
                        $('#modalUbah').modal('hide');

                        // Show SweetAlert for success
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil diubah!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload()


                        // Optional: You can reload the page or perform any other actions
                        // window.location.reload();
                        // } else {
                        //     Swal.fire({
                        //         title: 'Error',
                        //         text: 'Gagal mengubah data. Silakan coba lagi.',
                        //         icon: 'error',
                        //         timer: 1500
                        //     });
                        // }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Success',
                            text: 'Data berhasil diubah!',
                            icon: 'success',
                            timer: 1500
                        });
                    }
                });
            });

            // ... Other existing code ...
        });
        // $('#btnSaveChanges').on('click', function() {
        //     // Perform an AJAX form submission
        //     $.ajax({
        //         url: $('#formUbah').attr('action'),
        //         method: 'POST',
        //         data: $('#formUbah').serialize(),
        //         dataType: 'json',
        //         success: function(response) {
        //             if (response.success) {
        //                 $('#modalUbah').modal('hide');

        //                 Swal.fire({
        //                     position: 'top-end',
        //                     icon: 'success',
        //                     title: 'Data berhasil diubah!',
        //                     showConfirmButton: false,
        //                     timer: 1500
        //                 });

        //                 // Optional: You can reload the page or perform any other actions
        //                 // window.location.reload();
        //             } else {
        //                 Swal.fire({
        //                     title: 'Error',
        //                     text: 'Gagal mengubah data. Silakan coba lagi.',
        //                     icon: 'error'
        //                 });
        //             }
        //         },
        //         error: function() {
        //             Swal.fire({
        //                 title: 'Success',
        //                 text: 'Data berhasil diubah!',
        //                 icon: 'success'
        //             });
        //         }
        //     });
        // });
        </script>