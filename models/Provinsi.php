<?php
require_once '../../config/koneksi.php';

class Provinsi
{
    private $conn;
    private $table = "almt_provinsi";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table ORDER BY id_provinsi ASC");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_provinsi = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_provinsi, provinsi) VALUES (:id_provinsi, :provinsi)");
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET provinsi = :provinsi WHERE id_provinsi = :id");
        return $stmt->execute(['provinsi' => $data['provinsi'], 'id' => $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_provinsi = :id");
        return $stmt->execute(['id' => $id]);
    }
    public function searchProvinsis($keyword)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE nama_provinsi LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $likeKeyword = "%" . $keyword . "%";
        $stmt->bindParam(':keyword', $likeKeyword);
        $stmt->execute();
        return $stmt;
    }
}