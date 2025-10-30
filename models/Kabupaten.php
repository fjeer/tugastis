<?php
require_once '../../config/koneksi.php';

class Kabupaten
{
    private $conn;
    private $table = "almt_kabupaten";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT k.*, p.provinsi 
                                      FROM $this->table k 
                                      LEFT JOIN almt_provinsi p ON k.id_provinsi = p.id_provinsi 
                                      ORDER BY k.id_kabupaten ASC");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_kabupaten = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_provinsi, id_kabupaten, kabupaten) VALUES (:id_provinsi, :id_kabupaten, :kabupaten)");
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET id_provinsi = :id_provinsi, kabupaten = :kabupaten WHERE id_kabupaten = :id");
        return $stmt->execute(['id_provinsi' => $data['id_provinsi'], 'kabupaten' => $data['kabupaten'], 'id' => $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_kabupaten = :id");
        return $stmt->execute(['id' => $id]);
    }
    public function searchKabupatens($keyword)
    {
        $query = "SELECT k.*, p.almt_provinsi 
                  FROM kabupaten k 
                  LEFT JOIN provinsi p ON k.id_provinsi = p.id_provinsi 
                  WHERE k.kabupaten LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $likeKeyword = "%" . $keyword . "%";
        $stmt->bindParam(':keyword', $likeKeyword);
        $stmt->execute();
        return $stmt;
    }
}