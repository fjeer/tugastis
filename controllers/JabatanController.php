<?php
require_once '../../models/Jabatan.php';

class JabatanController
{
    private $jabatanModel;

    public function __construct($db)
    {
        $this->jabatanModel = new Jabatan($db);
    }

    public function index()
    {
        return $this->jabatanModel->getAll();
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->jabatanModel->create([
                'jabatan' => $_POST['jabatan']
            ]);
            header("Location: index.php");
        }
    }

    public function edit($id)
    {
        return $this->jabatanModel->getById($id);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->jabatanModel->update($id, [
                'jabatan' => $_POST['jabatan']
            ]);
            header("Location: index.php");
        }
    }

    public function delete($id)
    {
        $this->jabatanModel->delete($id);
        header("Location: index.php");
    }
}
