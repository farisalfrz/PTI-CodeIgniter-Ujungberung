<?php
class Item_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk memasukkan data ke dalam tabel t_model
    public function insert_item(array $data): bool {
        return $this->db->insert('t_model', $data);
    }

    // Fungsi untuk menampilkan seluruh data dari tabel t_model
    public function select_all() {
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->order_by('kd_model', 'desc');
        return $this->db->get();
    }

    /**
     * Fungsi untuk menampilkan data berdasarkan kode model.
     * Fungsi ini digunakan untuk proses pencarian.
     */
    public function select_by_kode(string $kd_model) {
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->where("LOWER(kd_model) LIKE '%{$kd_model}%'");
        return $this->db->get();
    }

    // Fungsi untuk menampilkan data berdasarkan ID
    public function select_by_id(string $kd_model) {
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->where('kd_model', $kd_model);
        return $this->db->get();
    }

    // Fungsi untuk memperbarui data di tabel t_model
    public function update_item(string $kd_model, array $data): bool {
        $this->db->where('kd_model', $kd_model);
        return $this->db->update('t_model', $data);
    }

    // Fungsi untuk menghapus data dari tabel t_model
    public function delete_item(string $kd_model): bool {
        $this->db->where('kd_model', $kd_model);
        return $this->db->delete('t_model');
    }

    // Fungsi untuk menampilkan data dengan pagination
    public function select_all_paging(array $limit = NULL) {
        $this->db->select('*');
        $this->db->from('t_model');

        if ($limit !== NULL) {
            $this->db->limit($limit['perpage'], $limit['offset']);
        }

        return $this->db->get();
    }

    // Menghitung jumlah rows dalam tabel t_model
    public function jumlah_item(): int {
        $this->db->select('*');
        $this->db->from('t_model');
        return $this->db->count_all_results();
    }

    // Fungsi untuk mengekspor data
    public function eksport_data() {
        $this->db->select('kd_model, nama_model, deskripsi');
        $this->db->from('t_model');
        return $this->db->get();
    }
}
?>
