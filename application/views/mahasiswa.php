<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Mahasiswa
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Mahasiswa</li>
        </ol>
    </section>

    <section class="content">
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Mahasiswa</button>
        <table class="table">
            <tr>
                <th>NO</th>
                <th>NAMA MAHASISWA</th>
                <th>NIM</th>
                <th>TANGGAL LAHIR</th>
                <th>JURUSAN</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php
            $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['nim']; ?></td>
                <td><?= $mhs['tgl_lahir']; ?></td>
                <td><?= $mhs['jurusan']; ?></td>
                <td>
                    <a href="<?= base_url('Mahasiswa/hapusDataMahasiswa/') . $mhs['id']; ?>" onclick="return confirm('Yakin ingin Menghapus Data ini');">
                        <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>
                    </a>
                    <a href="<?= base_url('Mahasiswa/ubahDataMahasiswa/') . $mhs['id']; ?>" onclick="return confirm('Yakin ingin Mengubah Data ini');">
                        <div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Form Input Data Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Mahasiswa/tambahDataMahasiswa'); ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" name="nim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option>Rekayasa Perangkat Lunak</option>
                                <option>Multimedia</option>
                                <option>Tehknik Komputer Jaringan</option>
                                <option>Tehknik Bisnis Sepeda Montor</option>
                            </select>
                        </div>
                </div>
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>