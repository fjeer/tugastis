<?php
require_once '../../models/Provinsi.php';

class ProvinsiController
{
    private $provinsiModel;

    public function __construct($db)
    {
        $this->provinsiModel = new Provinsi($db);
    }

    public function index()
    {
        return $this->provinsiModel->getAll();
    }

    public function store()
    {
        $this->provinsiModel->create([
            'id_provinsi' => $_POST['id_provinsi'],
            'provinsi' => $_POST['provinsi']
        ]);
        header("Location: index.php");
    }

    public function edit($id)
    {
        return $this->provinsiModel->getById($id);
    }

    public function update($id)
    {
        $this->provinsiModel->update($id, [
            'provinsi' => $_POST['provinsi']
        ]);
        header("Location: index.php");
    }

    public function destroy($id)
    {
        $this->provinsiModel->delete($id);
        header("Location: index.php");
    }
    public function search($keyword)
    {
        return $this->provinsiModel->searchProvinsis($keyword);
    }
}