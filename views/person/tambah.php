<?php
include_once '../layouts/header.php';
require_once '../../config/koneksi.php';
require_once '../../controllers/PersonController.php';
require_once '../../controllers/DesaController.php';
require_once '../../controllers/JabatanController.php';

$db = new Database();
$connection = $db->getConnection();
$controller = new PersonController($connection);
$desa = new DesaController($connection);
$desaList = $desa->index();
$jabatan = new JabatanController($connection);
$jabatanList = $jabatan->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
}


?>

<div class="container mt-4">
    <h3>Tambah Data Person</h3>
    <form method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>Desa</label>
                    <select name="id_desa" class="form-select" required>
                        <option value="">-- Pilih Desa --</option>
                        <?php foreach ($desaList as $desa): ?>
                            <option value="<?= $desa['id_desa'] ?>"><?= $desa['desa'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jabatan</label>
                    <select name="id_jabatan" class="form-select">
                        <option value="">-- Pilih Jabatan --</option>
                        <?php foreach ($jabatanList as $j): ?>
                            <option value="<?= $j['id_jabatan'] ?>"><?= $j['jabatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="nomor_hp" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>