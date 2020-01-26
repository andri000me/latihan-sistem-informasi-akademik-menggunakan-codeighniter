<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail Data Mahasiswa</strong></h4>

        <table class="table">
            <tr>
                <th>Nama Lengkap</th>
                <td><?= $mahasiswa['nama']; ?></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><?= $mahasiswa['nim']; ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><?= $mahasiswa['nama']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?= $mahasiswa['tgl_lahir']; ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td><?= $mahasiswa['jurusan']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $mahasiswa['alamat']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $mahasiswa['email']; ?></td>
            </tr>
            <tr>
                <th>No Telp</th>
                <td><?= $mahasiswa['no_telp']; ?></td>
            </tr>
        </table>
        <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary">Kembali</a>
    </section>
</div>