<?php
require_once '../../config/koneksi.php';

class Person
{
    private $conn;
    private $table = "person";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Ambil semua data person + relasi
    public function getAllPersons()
    {
        $query = "SELECT p.*, j.jabatan, d.desa 
                  FROM " . $this->table . " p
                  LEFT JOIN jabatan j ON p.id_jabatan = j.id_jabatan
                  LEFT JOIN almt_desa d ON p.id_desa = d.id_desa";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Ambil 1 data person berdasarkan ID
    public function getPersonById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_person = :id_person";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_person', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data person baru
    public function createPerson($data)
    {
        $query = "INSERT INTO " . $this->table . " 
                 (nama, jk, tempat_lahir, tanggal_lahir, kewarganegaraan, golongan_darah, nik, nomor_kk, alamat, rt, rw, id_desa, npwp, nomor_hp, email, foto, id_jabatan) 
                 VALUES 
                 (:nama, :jk, :tempat_lahir, :tanggal_lahir, :kewarganegaraan, :golongan_darah, :nik, :nomor_kk, :alamat, :rt, :rw, :id_desa, :npwp, :nomor_hp, :email, :foto, :id_jabatan)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    // Update data person berdasarkan ID
    public function updatePerson($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET 
                  nama = :nama, jk = :jk, tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir, kewarganegaraan = :kewarganegaraan, 
                  golongan_darah = :golongan_darah, nik = :nik, nomor_kk = :nomor_kk, alamat = :alamat, rt = :rt, rw = :rw, 
                  id_desa = :id_desa, npwp = :npwp, nomor_hp = :nomor_hp, email = :email, foto = :foto, id_jabatan = :id_jabatan 
                  WHERE id_person = :id_person";

        $stmt = $this->conn->prepare($query);
        $data['id_person'] = $id;
        return $stmt->execute($data);
    }

    // Hapus data
    public function deletePerson($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_person = :id_person";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_person', $id);
        return $stmt->execute();
    }

    // Cari person berdasarkan nama / NIK
    public function searchPersons($keyword)
    {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE nama LIKE :keyword OR nik LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $searchTerm = "%" . $keyword . "%";
        $stmt->bindParam(':keyword', $searchTerm);
        $stmt->execute();
        return $stmt;
    }
}
