<?php
require_once __DIR__ . '/../../config/database.php';

class Mahasiswa
{
    private $conn;
    private $table = "mahasiswa";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (nama, nim, jurusan) VALUES (:nama, :nim, :jurusan)");
        return $stmt->execute($data);
    }

    public function update($data)
    {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET nama=:nama, nim=:nim, jurusan=:jurusan WHERE id=:id");
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=:id");
        return $stmt->execute(['id' => $id]);
    }
}
