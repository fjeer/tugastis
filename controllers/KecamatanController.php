<?php
require_once '../../models/Kecamatan.php';

class KecamatanController
{
    private $kecamatanModel;

    public function __construct($db)
    {
        $this->kecamatanModel = new Kecamatan($db);
    }

    public function index()
    {
        return $this->kecamatanModel->getAll();
    }

    public function store()
    {
        $this->kecamatanModel->create([
            'id_kabupaten' => $_POST['id_kabupaten'],
            'id_kecamatan' => $_POST['id_kecamatan'],
            'kecamatan' => $_POST['kecamatan']
        ]);
        header("Location: index.php");
    }

    public function edit($id)
    {
        return $this->kecamatanModel->getById($id);
    }

    public function update($id)
    {
        $this->kecamatanModel->update($id, [
            'id_kabupaten' => $_POST['id_kabupaten'],
            'kecamatan' => $_POST['kecamatan']
        ]);
        header("Location: index.php");
    }

    public function destroy($id)
    {
        $this->kecamatanModel->delete($id);
        header("Location: index.php");
    }

    public function search($keyword)
    {
        return $this->kecamatanModel->searchKecamatans($keyword);
    }
}   