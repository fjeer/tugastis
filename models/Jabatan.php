<?php
require_once '../../config/koneksi.php';

class Jabatan
{
    private $conn;
    private $table = "jabatan";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_jabatan DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_jabatan = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " (jabatan) VALUES (:jabatan)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['jabatan' => $data['jabatan']]);
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET jabatan = :jabatan WHERE id_jabatan = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            'jabatan' => $data['jabatan'],
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_jabatan = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
    public function searchJabatans($keyword)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE jabatan LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $likeKeyword = "%" . $keyword . "%";
        $stmt->bindParam(':keyword', $likeKeyword);
        $stmt->execute();
        return $stmt;
    }
}   