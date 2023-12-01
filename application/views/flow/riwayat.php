<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <h3><?= $judul ?></h3>
        </div>
        <div class="card-body mt-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Flow</th>
                        <th>Nama Barang</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Stok Sebelumnya</th>
                        <th class="text-center">Stok Setelahnya</th>
                        <th class="text-center">Action</th>
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
                        <td><?php echo $item->nama_kategori ?></td>
                        <td class="text-center"><?php echo $item->qty ?></td>
                        <td class="text-center"><?php echo $item->stock_before ?></td>
                        <td class="text-center"><?php echo $item->stock_after ?></td>
                        <td class="text-center">
                            <form id="form-delete-<?= $item->id ?>" method="post"
                                action="<?= site_url('flow/delete/' . $item->id); ?>">
                                <button type="button" class="btn btn-sm btn-danger btn-confirm-delete"
                                    data-id="<?= $item->id ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function() {
    $('body').on('click', '.btn-confirm-delete', function() {
        var id = $(this).data('id');

        // Use SweetAlert2 for confirmation
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Yakin ingin menghapus data barang?',
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
});
</script>