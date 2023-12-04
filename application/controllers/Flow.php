    <?php
	defined('BASEPATH') or exit('No direct script access allowed');
	class Flow extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function masuk()
		{
			$data = [
				'judul' => 'Flow Barang Masuk',
				'barang' => $this->db->get('barang')->result(),
				'kategori' => $this->db->get('kategori')->result(),
			];


			$this->load->view('_template/v_header', $data);
			$this->load->view('_template/v_sidebar', $data);
			$this->load->view('_template/v_topbar', $data);
			$this->load->view('flow/masuk', $data);
			$this->load->view('_template/v_footer', $data);
		}
		public function keluar()
		{
			$data = [
				'judul' => 'Flow Barang Keluar',
				'barang' => $this->db->get('barang')->result(),
				'kategori' => $this->db->get('kategori')->result(),
			];

			$this->load->view('_template/v_header', $data);
			$this->load->view('_template/v_sidebar', $data);
			$this->load->view('_template/v_topbar', $data);

			// Fetch data for stockflow, ensuring to join the kategori table
			$data['stockflow'] = $this->db
				->select('stockflow.*, barang.nama_barang, kategori.nama_kategori')
				->from('stockflow')
				->join('barang', 'barang.id_barang = stockflow.id_barang', 'left')
				->join('kategori', 'kategori.id_kategori = stockflow.id_kategori', 'left')
				->order_by('stockflow.id', 'DESC')
				->get()
				->result();

			$this->load->view('flow/keluar', $data);
			$this->load->view('_template/v_footer', $data);
		}


		public function riwayat()
		{
			$data = [
				'judul' => 'Riwayat Flow Barang',
				'stockflow' => $this->db
					->select('stockflow.*, barang.nama_barang, kategori.nama_kategori')
					->from('stockflow')
					->join('barang', 'barang.id_barang = stockflow.id_barang', 'left')
					->join('kategori', 'kategori.id_kategori = stockflow.id_kategori', 'left')
					->order_by('stockflow.id', 'DESC')
					->get()
					->result(),
			];



			// Debugging: Output the SQL query
			// echo $this->db->last_query();

			// Debugging: Output the fetched data
			// print_r($data['stockflow']);

			$this->load->view('_template/v_header', $data);
			$this->load->view('_template/v_sidebar', $data);
			$this->load->view('_template/v_topbar', $data);
			$this->load->view('flow/riwayat', $data);
			$this->load->view('_template/v_footer', $data);
		}

		public function store()
		{
			$flow = $this->input->get('flow');

			if (isset($flow)) {
				$id_barang = $this->input->post('id_barang');
				$id_kategori = $this->input->post('id_kategori');
				$qty = $this->input->post('qty');
				$barang = $this->db->get_where('barang', array('id_barang' => $id_barang))->row();

				// Check if id_kategori is set, otherwise set it to a default value or handle it as needed
				if (!isset($id_kategori)) {
					// You can set a default value or handle it based on your requirements
					// For example, setting it to 0:
					$id_kategori = 0;
				}

				if ($flow == 'masuk') {
					$update = [
						'stok' => $barang->stok + $qty,
					];
				} elseif ($flow == 'keluar') {
					$update = [
						'stok' => $barang->stok - $qty,
					];
				}

				if (isset($update)) {
					$this->db->where(['id_barang' => $id_barang])->update('barang', $update);

					$insert = [
						'flow' => $flow,
						'id_barang' => $id_barang,
						'id_kategori' => $id_kategori,
						'qty' => $qty,
						'stock_before' => $barang->stok,
						'stock_after' => $update['stok'],
						'created_at' => date('Y-m-d H:i:s'),
					];

					$success = $this->db->insert('stockflow', $insert);

					// Check if the insertion was successful and respond accordingly
					if ($success) {
						echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan!']);
					} else {
						echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan data. Silakan coba lagi.']);
					}
				} else {
					// Respond with an error
					echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan.']);
				}
			} else {
				// Respond with an error
				echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan.']);
			}
		}



		public function delete($id)
		{
			// Check if it's an AJAX request
			if ($this->input->is_ajax_request()) {
				// Handle AJAX delete request
				$this->ajaxDelete($id);
			} else {
				// Handle regular delete request
				$this->regularDelete($id);
			}
		}

		private function ajaxDelete($id)
		{
			// Your AJAX delete logic here
			if (!is_numeric($id) || $id <= 0) {
				$response = [
					'status' => 'error',
					'message' => 'Invalid ID provided.'
				];
			} else {
				$item = $this->db->get_where('stockflow', ['id' => $id])->row();
				if (!$item) {
					$response = [
						'status' => 'error',
						'message' => 'Record not found.'
					];
				} else {
					$this->db->where('id', $id)->delete('stockflow');
					$response = [
						'status' => 'success',
						'message' => 'Data berhasil dihapus!'
					];
				}
			}

			// Return the response as JSON
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}

		private function regularDelete($id)
		{
			// Handle regular delete request
			if (!is_numeric($id) || $id <= 0) {
				redirect('flow/riwayat');
				return;
			}

			$item = $this->db->get_where('stockflow', ['id' => $id])->row();
			if (!$item) {
				redirect('flow/riwayat');
				return;
			}

			$this->db->where('id', $id)->delete('stockflow');
			redirect('flow/riwayat');
		}
	}
