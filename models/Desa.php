<?php
require_once '../../config/koneksi.php';

class Desa
{
    private $conn;
    private $table = "almt_desa";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT d.*, k.kecamatan 
                                      FROM $this->table d 
                                      LEFT JOIN almt_kecamatan k ON d.id_kecamatan = k.id_kecamatan 
                                      ORDER BY d.id_desa DESC");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_desa = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_kecamatan, id_desa, desa) VALUES (:id_kecamatan, :id_desa, :desa)");
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET id_kecamatan = :id_kecamatan, desa = :desa WHERE id_desa = :id");
        return $stmt->execute(['id_kecamatan' => $data['id_kecamatan'], 'desa' => $data['desa'], 'id' => $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_desa = :id");
        return $stmt->execute(['id' => $id]);
    }
        public function searchDesas($keyword)
        {
            $query = "SELECT d.*, k.kecamatan 
                    FROM almt_desa d 
                    LEFT JOIN almt_kecamatan k ON d.id_kecamatan = k.id_kecamatan 
                    WHERE d.desa LIKE :keyword";
            $stmt = $this->conn->prepare($query);
            $likeKeyword = "%" . $keyword . "%";
            $stmt->bindParam(':keyword', $likeKeyword);
            $stmt->execute();
            return $stmt;
        }
    }