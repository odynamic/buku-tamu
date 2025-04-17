<?php
class Tamu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menyimpan data tamu baru ke dalam database
    public function insert($data) {
        // Menyimpan data tamu ke tabel 'tb_buku_tamu'
        return $this->db->insert('tb_buku_tamu', $data);
    }

    // Mengambil semua data tamu
    public function get_all_data() {
        // Mengambil semua data dari tabel 'tb_buku_tamu'
        return $this->db->get('tb_buku_tamu')->result();
    }

    // Memfilter data tamu berdasarkan rentang tanggal kunjungan
    public function filter_tanggal($tanggal_awal, $tanggal_akhir) {
        // Menambahkan filter untuk rentang tanggal kunjungan
        $this->db->where('tanggal_kunjungan >=', $tanggal_awal);
        $this->db->where('tanggal_kunjungan <=', $tanggal_akhir);
        // Mengambil data yang sesuai dengan filter tanggal
        return $this->db->get('tb_buku_tamu')->result();
    }

    // Menghapus data tamu berdasarkan ID
    public function hapus_data($id) {
        // Menghapus data dari tabel 'tb_buku_tamu' berdasarkan ID
        $this->db->delete('tb_buku_tamu', array('id' => $id));
    }

    // Mengambil data tamu berdasarkan ID untuk tujuan edit
    public function get_by_id($id) {
        // Mengambil data tamu berdasarkan ID dari tabel 'tb_buku_tamu'
        return $this->db->get_where('tb_buku_tamu', array('id' => $id))->row();
    }

    // Mengupdate data tamu berdasarkan ID
    public function update_data($id, $data) {
        // Menentukan ID yang akan diupdate
        $this->db->where('id', $id);
        // Mengupdate data tamu pada tabel 'tb_buku_tamu' dengan data baru
        return $this->db->update('tb_buku_tamu', $data);
    }

    // Validasi data yang akan disimpan
    public function validate_data($data) {
        // Validasi: Pastikan semua field yang wajib diisi ada
        if (empty($data['nama']) || empty($data['tanggal_kunjungan'])) {
            return false;
        }
        // Jika semua validasi lolos, return true
        return true;
    }
}
?>
