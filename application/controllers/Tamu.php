<?php
class Tamu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model Tamu_model untuk interaksi dengan database
        $this->load->model('Tamu_model');
        // Memuat library form_validation untuk validasi form input
        $this->load->library('form_validation');
    }

    // Menampilkan form Buku Tamu
    public function index() {
        $this->load->view('form_tamu');
    }

    // Menyimpan data tamu yang diinputkan
    public function simpan() {
        // Set rules untuk validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');  // Nama wajib diisi
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');  // Instansi wajib diisi
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');  // Tujuan wajib diisi
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');  // Tanggal kunjungan wajib diisi

        // Jika validasi gagal, tampilkan form kembali
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form_tamu');
        } else {
            // Menyiapkan data yang akan disimpan
            $data = array(
                'nama' => $this->input->post('nama'),
                'instansi' => $this->input->post('instansi'),
                'tujuan' => $this->input->post('tujuan'),
                'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            );
            // Menyimpan data ke database melalui model
            $this->Tamu_model->insert($data);
            // Memberikan pesan sukses setelah data berhasil disimpan
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('tamu');  // Redirect ke halaman form setelah menyimpan
        }
    }

    // Menampilkan data tamu untuk admin dengan filter tanggal
    public function admin() {
        // Mengambil filter tanggal jika ada dari URL
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');
    
        // Simpan filter tanggal di session untuk penggunaan berikutnya
        if ($tanggal_awal && $tanggal_akhir) {
            $this->session->set_userdata('tanggal_awal', $tanggal_awal);
            $this->session->set_userdata('tanggal_akhir', $tanggal_akhir);
            // Filter data berdasarkan tanggal
            $data['tamu'] = $this->Tamu_model->filter_tanggal($tanggal_awal, $tanggal_akhir);
    
            // Menambahkan pesan jika tidak ada data
            if (empty($data['tamu'])) {
                $data['message'] = 'Tidak ada data tamu yang ditemukan.';
            }
        } else {
            // Tampilkan semua data jika tidak ada filter tanggal
            $data['tamu'] = $this->Tamu_model->get_all_data();
        }
    
        // Tampilkan data tamu ke halaman admin
        $this->load->view('admin', $data);
    }
    
    // Menghapus data tamu berdasarkan ID
    public function hapus($id) {
        $this->Tamu_model->hapus_data($id);  // Menghapus data menggunakan model
        // Memberikan pesan sukses setelah data dihapus
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('tamu/admin');  // Redirect ke halaman admin setelah menghapus
    }

    // Menampilkan form untuk mengedit data tamu
    public function edit($id) {
        $data['tamu'] = $this->Tamu_model->get_by_id($id);  // Mengambil data tamu berdasarkan ID

        // Jika data tidak ditemukan, tampilkan halaman 404
        if (!$data['tamu']) {
            show_404();
        }

        // Memuat tampilan edit dengan data tamu yang akan diubah
        $this->load->view('edit_tamu', $data);
    }

    // Menyimpan perubahan data tamu
    public function update($id) {
        $data['tamu'] = $this->Tamu_model->get_by_id($id);  // Mengambil data tamu yang akan diperbarui

        // Set rules untuk validasi form input
        $this->form_validation->set_rules('nama', 'Nama', 'required');  // Nama wajib diisi
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');  // Instansi wajib diisi
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');  // Tujuan wajib diisi
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');  // Tanggal kunjungan wajib diisi

        // Jika validasi gagal, tampilkan form edit dengan data lama
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('edit_tamu', $data);
        } else {
            // Menyiapkan data yang akan diupdate
            $data = array(
                'nama' => $this->input->post('nama'),
                'instansi' => $this->input->post('instansi'),
                'tujuan' => $this->input->post('tujuan'),
                'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            );
            // Mengupdate data tamu melalui model
            $this->Tamu_model->update_data($id, $data);
            // Memberikan pesan sukses setelah data diperbarui
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('tamu/admin');  // Redirect ke halaman admin setelah update
        }
    }

    // Menghapus filter tanggal yang ada
    public function reset_filter() {
        // Menghapus data filter tanggal dari session
        $this->session->unset_userdata('tanggal_awal');
        $this->session->unset_userdata('tanggal_akhir');
        redirect('tamu/admin');  // Redirect kembali ke halaman admin tanpa filter
    }
}
?>
