<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>
<body>
    <a href="<?= site_url('tambah')?>">
        <button>tambah</button>
    </a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        <?php
            $no = 0; 
            foreach($daftar_siswa as $siswa): ?>
        <tr>
            <td><?= $no+=1?></td>
            <td><?= $siswa->nama?></td>
            <td><?= $siswa->kelas?></td>
            <td>
            <a href="<?= site_url('siswa/').$siswa->id?>">
                <button>edit</button>
            </a>
                <form action="<?= site_url('delete/').$siswa->id ?>" method="POST">
                    <input type="hidden" name='id' value=<?= $siswa->id?>>
                    <button type='submit'>delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>