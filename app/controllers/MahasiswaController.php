<?php
require_once __DIR__ . '/../models/Mahasiswa.php';

class MahasiswaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Mahasiswa();
    }

    public function index()
    {
        $data = $this->model->getAll();
        include __DIR__ . '/../views/mahasiswa/index.php';
    }

    public function create()
    {
        include __DIR__ . '/../views/mahasiswa/create.php';
    }

    public function store()
    {
        $this->model->create([
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'jurusan' => $_POST['jurusan']
        ]);
        header("Location: index.php");
    }

    public function edit($id)
    {
        $data = $this->model->getById($id);
        include __DIR__ . '/../views/mahasiswa/edit.php';
    }

    public function update()
    {
        $this->model->update([
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'nim' => $_POST['nim'],
            'jurusan' => $_POST['jurusan']
        ]);
        header("Location: index.php");
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: index.php");
    }
}
