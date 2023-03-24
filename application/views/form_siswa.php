<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        .invalid {
            border: 2px solid rgb(153, 16, 16);
        }

        .invalid::placeholder {
            color: rgb(153, 16, 16);
        }

        .invalid-feedback:empty {
            display: none;
        }
        .invalid-feedback {
            font-size: smaller;
            color: rgb(153, 16, 16);
        }
    </style>
</head>
<body>
    <form action="<?= isset($siswa)? site_url('update_siswa'): site_url('add_siswa')?>" method="POST">
        
        <?= isset($siswa->id)? '<input type="hidden" name="id" value="'.$siswa->id.'">' : ''?>
                
        <input type="number" name="nis" placeholder="Nis siswa" class="<?= form_error('nis') ? 'invalid' : '' ?>" <?= isset($siswa->nis)? 'value='.$siswa->nis:''?>>
        <?= form_error('nis') ?>
        <input type="text" name="nama" placeholder="Nama siswa" class="<?= form_error('nama') ? 'invalid' : '' ?>" <?= isset($siswa->nama)? 'value='.$siswa->nama:''?>>
        <?= form_error('nama') ?>
        <select name="kelas" id="">
            <option value="x rpl a" <?= isset($siswa->kelas) && $siswa->kelas == 'x rpl a'? 'selected':''?>>X RPL A</option>
            <option value="x rpl b" <?= isset($siswa->kelas) && $siswa->kelas == 'x rpl b'? 'selected':''?>>X RPL B</option>
            <option value="x rpl c" <?= isset($siswa->kelas) && $siswa->kelas == 'x rpl c'? 'selected':''?>>X RPL C</option>
        </select>
        <?= form_error('kelas') ?>
        <input type="submit" value="SIMPAN" name="simpan">
    </form>
</body>
</html>