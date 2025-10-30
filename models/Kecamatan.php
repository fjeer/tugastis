<?php
require_once '../../config/koneksi.php';

class Kecamatan
{
    private $conn;
    private $table = "almt_kecamatan";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT k.*, kb.kabupaten 
                                      FROM $this->table k 
                                      LEFT JOIN almt_kabupaten kb ON k.id_kabupaten = kb.id_kabupaten 
                                      ORDER BY k.id_kecamatan DESC");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_kecamatan = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_kabupaten, id_kecamatan, kecamatan) VALUES (:id_kabupaten, :id_kecamatan, :kecamatan)");
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET id_kabupaten = :id_kabupaten, kecamatan = :kecamatan WHERE id_kecamatan = :id");
        return $stmt->execute(['id_kabupaten' => $data['id_kabupaten'], 'kecamatan' => $data['kecamatan'], 'id' => $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_kecamatan = :id");
        return $stmt->execute(['id' => $id]);
    }
    public function searchKecamatans($keyword)
    {
        $query = "SELECT k.*, kb.kabupaten 
                  FROM kecamatan k 
                  LEFT JOIN almt_kabupaten kb ON k.id_kabupaten = kb.id_kabupaten 
                  WHERE k.kecamatan LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $likeKeyword = "%" . $keyword . "%";
        $stmt->bindParam(':keyword', $likeKeyword);
        $stmt->execute();
        return $stmt;
    }
}