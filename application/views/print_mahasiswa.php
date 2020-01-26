<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Print</title>
</head>

<body>
    <table>
        <tr>
            <th>NO</th>
            <th>NAMA MAHASISWA</th>
            <th>NIM</th>
            <th>TANGGAL LAHIR</th>
            <th>JURUSAN</th>
            <th>ALAMAT</th>
            <th>EMAIL</th>
            <th>NO TELP</th>
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
            <td><?= $mhs['alamat']; ?></td>
            <td><?= $mhs['email']; ?></td>
            <td><?= $mhs['no_telp']; ?></td>
        </tr>
        <?php endforeach ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>