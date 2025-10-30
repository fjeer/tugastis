<?php
require_once '../../models/Kabupaten.php';

class KabupatenController
{
    private $kabupatenModel;

    public function __construct($db)
    {
        $this->kabupatenModel = new Kabupaten($db);
    }

    public function index()
    {
        return $this->kabupatenModel->getAll();
    }

    public function store()
    {
        $this->kabupatenModel->create([
            'id_provinsi' => $_POST['id_provinsi'],
            'id_kabupaten' => $_POST['id_kabupaten'],
            'kabupaten' => $_POST['kabupaten']
        ]);
        header("Location: index.php");
    }

    public function edit($id)
    {
        return $this->kabupatenModel->getById($id);
    }

    public function update($id)
    {
        $this->kabupatenModel->update($id, [
            'id_provinsi' => $_POST['id_provinsi'],
            'kabupaten' => $_POST['kabupaten']
        ]);
        header("Location: index.php");
    }

    public function destroy($id)
    {
        $this->kabupatenModel->delete($id);
        header("Location: index.php");
    }

    public function search($keyword)
    {
        return $this->kabupatenModel->searchKabupatens($keyword);
    }
}