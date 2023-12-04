<!-- Begin Page Content -->
<script>
	function submitUpdate(id) {
		const data = {
			"id_barang": $('#edit-id_barang' + id).val(),
			"nama_barang": $('#edit-nama_barang' + id).val(),
		};
		$.ajax({
			url: "<?= base_url('barang/update/') ?>",
			method: 'POST',
			data: data,
			dataType: 'json',
			success: function(response) {
				var response = JSON.parse(JSON.stringify(response))
				$('#modalUbah').modal('hide');
				Swal.fire({
					icon: response.icon,
					title: response.title,
					showConfirmButton: false,
					timer: 3000
				}).then(function() {
					location.reload()
				});

			},
			error: function() {
				Swal.fire({
					title: 'Error',
					text: 'Failed to add data. Please try again.',
					icon: 'error'
				});
			}
		});
	}
</script>
<div class="container-fluid">
	<div class="card mt-2">
		<div class="card-header">
			<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
				<i class="fa fa-plus">Tambah Data</i>
			</button>

		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
							foreach ($barang as $index => $item) {
							?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $item->nama_barang ?></td>
									<td><?php echo $item->stok ?></td>
									<td class="d-flex align-items-center">
										<div class="mr-2">
											<button type="button" data-toggle="modal" class="btn btn-sm btn-warning btn-edit" data-target="#modalUbah<?= $item->id_barang ?>">
												<i class="fa fa-edit"></i>
											</button>
										</div>

										<form id="form-delete-<?= $item->id_barang ?>" method="post" action="<?= site_url('barang/hapus/' . $item->id_barang); ?>">
											<button type="button" class="btn btn-sm btn-danger btn-confirm-delete" data-id="<?= $item->id_barang ?>">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>

								<div class="modal fade" id="modalUbah<?= $item->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalUbahLabel">Edit Data</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form method="post">

												<div class="modal-body">
													<input type="hidden" class="form-control" id="edit-id_barang<?= $item->id_barang; ?>" name="id_barang" value="<?= $item->id_barang; ?>">
													<label for="editNamaBarang">Nama Barang:</label>
													<input type="text" class="form-control" id="edit-nama_barang<?= $item->id_barang; ?>" name="nama_barang" value="<?= $item->nama_barang; ?>">

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<a class="btn btn-primary" onclick="submitUpdate('<?= $item->id_barang; ?>')">Save
														changes</a>
												</div>
											</form>
										</div>
									</div>
								</div>
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
						<form action="<?= base_url('barang/tambah') ?>" method="post" id="formTambah">
							<div class="form-group mb-0">
								<label for="nama_barang"></label>
								<input type="text" name="nama_barang" id="create-nama_barang" class="form-control" placeholder="Masukkan Nama Barang">
							</div>
							<div class="form-group mb-0">
								<label for="stok"></label>
								<input type="text" name="stok" id="create-stok" class="form-control" placeholder="Masukkan stok">
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
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
	$(document).ready(function() {
		$('.btn-edit').on('click', function() {
			var id = $(this).data('id');
			var nama_barang = $(this).data('nama_barang');
			var stok = $(this).data('stok');

			var modalId = '#modalUbah' + id;

			$(modalId + ' #editNamaBarang').val(nama_barang);
			$(modalId + ' #editStok').val(stok);

			$(modalId).modal('show');
		});

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
					// Use AJAX to send a DELETE request
					$.ajax({
						url: "<?= base_url('barang/hapus/') ?>" + id,
						method: 'DELETE',
						dataType: 'json',
						success: function(response) {
							// Show SweetAlert for success
							Swal.fire({
								icon: response.status === 'success' ? 'success' : 'error',
								title: response.message,
								timer: 3000
							}).then(function() {
								location.reload();
							});
						},
						error: function() {
							Swal.fire({
								title: 'Error',
								text: 'Failed to delete data. Please try again.',
								icon: 'error'
							});
						}
					});
				}
			});
		});
		
		$('body').on('click', '.btn-update', function() {
			// Perform an AJAX form submission

		});

		// ... Other existing code ... 
	});
	$(document).ready(function() {
		$('#btnTambahData').on('click', function() {
			const data = {
				"nama_barang": $('#create-nama_barang').val(),
				"stok": $('#create-stok').val(),
			};
			$.ajax({
				url: "<?= base_url('barang/tambah') ?>",
				method: 'POST',
				// data: $('#formTambah').serialize(),
				data: data,
				success: function(response) {
					var response = JSON.parse(response)
					$('#modalTambah').modal('hide');
					Swal.fire({
						icon: response.icon,
						title: response.title,
						showConfirmButton: false,
						timer: 1500
					}).then(function() {
						location.reload()
					});
					// location.reload()
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

		// ... Other existing code ...
	});
</script>
