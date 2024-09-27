<?php ob_start(); ?>
<div class="container">
    <h1>Daftar Departemen</h1>
    <a class="btn btn-success" href="/web_cuti/index.php/departemen/create">Tambah Departemen</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Departemen</th>
                <th>Jumlah Karyawan</th>
                <th>Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departemen as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_departemen']); ?></td>
                    <td><?= htmlspecialchars($row['jumlah_karyawan']); ?></td>
                    <td><a class="btn btn-primary" href="/web_cuti/index.php/departemen/detail?id=<?= urlencode($row['kode']); ?>">LIHAT</a></td>
                    <td><a class="btn btn-warning" href="/web_cuti/index.php/departemen/edit?id=<?= urlencode($row['kode']); ?>">UBAH</a></td>
                    <td><a class="btn btn-danger delete-button" href="/web_cuti/index.php/departemen/delete?id=<?= urlencode($row['kode']); ?>">HAPUS</a></td>
                </tr>  
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $isi = ob_get_clean(); ?>
<?php include 'view/template.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var confirmDelete = confirm('Apakah Anda yakin ingin menghapus departemen ini?');
                if (!confirmDelete) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
