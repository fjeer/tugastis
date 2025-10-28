<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Daftar Mahasiswa</h2>
<a href="index.php?action=create" class="btn btn-primary mb-3">Tambah Data</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $mhs): ?>
            <tr>
                <td><?= $mhs['id'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['jurusan'] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $mhs['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?action=delete&id=<?= $mhs['id'] ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
</body>

</html>