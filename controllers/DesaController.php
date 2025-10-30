<?php
require_once '../../models/Desa.php';

class DesaController
{
    private $desaModel;

    public function __construct($db)
    {
        $this->desaModel = new Desa($db);
    }

    public function index()
    {
        return $this->desaModel->getAll();
    }

    public function store()
    {
        $this->desaModel->create([
            'id_kecamatan' => $_POST['id_kecamatan'],
            'id_desa' => $_POST['id_desa'],
            'desa' => $_POST['desa']
        ]);
        header("Location: index.php");
    }

    public function edit($id)
    {
        return $this->desaModel->getById($id);
    }

    public function update($id)
    {
        $this->desaModel->update($id, [
            'id_kecamatan' => $_POST['id_kecamatan'],
            'desa' => $_POST['desa']
        ]);
        header("Location: index.php");
    }

    public function destroy($id)
    {
        $this->desaModel->delete($id);
        header("Location: index.php");
    }
    public function search($keyword)
    {
        return $this->desaModel->searchDesas($keyword);
    }
}