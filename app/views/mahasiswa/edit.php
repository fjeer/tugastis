<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Edit Mahasiswa</h2>
<form method="POST" action="index.php?action=update">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" value="<?= $data['nim'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="<?= $data['jurusan'] ?>" required>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</div>
</body>

</html>