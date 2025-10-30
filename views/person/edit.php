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
$jabatan = new JabatanController($connection);

$id = $_GET['id'];
$data = $controller->show($id);
$desaList = $desa->index();
$jabatanList = $jabatan->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id);
}

?>

<div class="container mt-4">
    <h3>Edit Data Person</h3>
    <form method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-select" required>
                        <option value="L" <?= $data['jk'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= $data['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?= $data['tempat_lahir'] ?>">
                </div>
                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir'] ?>">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2"><?= $data['alamat'] ?></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>Desa</label>
                    <select name="id_desa" class="form-select">
                        <?php foreach ($desaList as $desa): ?>
                            <option value="<?= $desa['id_desa'] ?>" <?= $data['id_desa'] == $desa['id_desa'] ? 'selected' : '' ?>>
                                <?= $desa['desa'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jabatan</label>
                    <select name="id_jabatan" class="form-select">
                        <?php foreach ($jabatanList as $j): ?>
                            <option value="<?= $j['id_jabatan'] ?>" <?= $data['id_jabatan'] == $j['id_jabatan'] ? 'selected' : '' ?>>
                                <?= $j['jabatan'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="nomor_hp" class="form-control" value="<?= $data['nomor_hp'] ?>">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="index_person.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once '../layouts/footer.php'; ?>