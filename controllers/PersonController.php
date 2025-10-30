<?php
require_once '../../models/Person.php';

class PersonController
{
    private $personModel;

    public function __construct($db)
    {
        $this->personModel = new Person($db);
    }

    /**
     * Tampilkan semua data person
     */
    public function index()
    {
        return $this->personModel->getAllPersons();
    }

    /**
     * Tampilkan detail 1 person berdasarkan ID
     */
    public function show($id)
    {
        return $this->personModel->getPersonById($id);
    }

    /**
     * Simpan data baru dari form tambah_person.php
     */
    public function store()
    {
        $data = [
            'nama' => $_POST['nama'],
            'jk' => $_POST['jk'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tanggal_lahir' => $_POST['tanggal_lahir'],
            'kewarganegaraan' => $_POST['kewarganegaraan'],
            'golongan_darah' => $_POST['golongan_darah'],
            'nik' => $_POST['nik'],
            'nomor_kk' => $_POST['nomor_kk'],
            'alamat' => $_POST['alamat'],
            'rt' => $_POST['rt'],
            'rw' => $_POST['rw'],
            'id_desa' => $_POST['id_desa'],
            'npwp' => $_POST['npwp'],
            'nomor_hp' => $_POST['nomor_hp'],
            'email' => $_POST['email'],
            'foto' => $_POST['foto'],
            'id_jabatan' => $_POST['id_jabatan']
        ];

        $this->personModel->createPerson($data);
        header("Location: index.php");
        exit;
    }

    /**
     * Update data dari form edit_person.php
     */
    public function update($id)
    {
        $data = [
            'nama' => $_POST['nama'],
            'jk' => $_POST['jk'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tanggal_lahir' => $_POST['tanggal_lahir'],
            'kewarganegaraan' => $_POST['kewarganegaraan'],
            'golongan_darah' => $_POST['golongan_darah'],
            'nik' => $_POST['nik'],
            'nomor_kk' => $_POST['nomor_kk'],
            'alamat' => $_POST['alamat'],
            'rt' => $_POST['rt'],
            'rw' => $_POST['rw'],
            'id_desa' => $_POST['id_desa'],
            'npwp' => $_POST['npwp'],
            'nomor_hp' => $_POST['nomor_hp'],
            'email' => $_POST['email'],
            'foto' => $_POST['foto'],
            'id_jabatan' => $_POST['id_jabatan']
        ];

        $this->personModel->updatePerson($id, $data);
        header("Location: index.php");
        exit;
    }

    /**
     * Hapus data berdasarkan ID
     */
    public function destroy($id)
    {
        $this->personModel->deletePerson($id);
        header("Location: index.php");
        exit;
    }

    /**
     * Pencarian berdasarkan nama/NIK
     */
    public function search()
    {
        $keyword = $_GET['keyword'] ?? '';
        return $this->personModel->searchPersons($keyword);
    }

}

// Routing sederhana berbasis ?action=
// if (isset($_GET['action'])) {
//     require_once '../../config/koneksi.php';
//     $database = new Database();
//     $db = $database->getConnection();
//     $controller = new PersonController($db);

//     $action = $_GET['action'];
//     switch ($action) {
//         case 'store':
//             $controller->store();
//             break;
//         case 'update':
//             $id = $_GET['id'] ?? null;
//             if ($id)
//                 $controller->update($id);
//             break;
//         case 'destroy':
//             $id = $_GET['id'] ?? null;
//             if ($id)
//                 $controller->destroy($id);
//             break;
//     }
// }
