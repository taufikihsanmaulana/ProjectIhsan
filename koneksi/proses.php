<?php

require 'koneksi.php';
if ($_GET['id'] == 'login') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = ? AND password = (?)");

    $row->execute(array($user, $pass));

    $hitung = $row->rowCount();

    if ($hitung > 0) {

        session_start();
        $hasil = $row->fetch();

        $_SESSION['USER'] = $hasil;

        if ($_SESSION['USER']['level'] == 'admin') {
            echo '<script>alert("Login Sukses");window.location="../admin/index.php";</script>';
        } else {
            echo '<script>alert("Login Sukses");window.location="../index.php";</script>';
        }
    } else {
        echo '<script>alert("Login Gagal");window.location="../index.php";</script>';
    }
}

if ($_GET['id'] == 'daftar') {
    $data[] = $_POST['nama'];
    $data[] = $_POST['user'];
    $data[] = $_POST['pass'];
    $data[] = 'pengguna';

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = ?");

    $row->execute(array($_POST['user']));

    $hitung = $row->rowCount();

    if ($hitung > 0) {
        echo '<script>alert("Daftar Gagal, Username Sudah digunakan ");window.location="../index.php";</script>';
    } else {

        $sql = "INSERT INTO `login`(`nama_pengguna`, `username`, `password`, `level`)
                VALUES (?,?,?,?)";
        $row = $koneksi->prepare($sql);
        $row->execute($data);

        echo '<script>alert("Daftar Sukses Silahkan Login");window.location="../index.php";</script>';
    }
}

if ($_GET['id'] == 'booking') {

    $data[] = time();
    $data[] = $_POST['id_login'];
    $data[] = $_POST['id_mobil'];
    $data[] = $_POST['nik'];
    $data[] = $_POST['pemesan'];
    $data[] = $_POST['divisi'];
    $data[] = $_POST['tgl_pesan'];
    $data[] = $_POST['tgl_pake'];
    $data[] = $_POST['lama_pake'];
    $data[] = $_POST['kota'];
    $data[] = $_POST['tujuan'];
    $data[] = $_POST['alamat'];
    $data[] = $_POST['keperluan'];
    $data[] = $_POST['jml_orang'];
    $data[] = $_POST['jml_barang'];
    $data[] = $_POST['etd_padma'];
    $data[] = $_POST['eta_tujuan'];
    $data[] = "Belum di proses";
    $data[] = date('Y-m-d');

    $sql = "INSERT INTO booking (kode_booking, 
    id_login, 
    id_mobil, 
    nik,
    pemesan,
    divisi,
    tgl_pesan,
    tgl_pake,
    lama_pake,
    kota,
    tujuan,
    alamat,
    keperluan,
    jml_orang,
    jml_barang,
    etd_padma,
    eta_tujuan,
    konfirmasi_booking, tgl_input) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    echo '<script>alert("Anda Sukses Booking silahkan Melakukan Konfirmasi");
    window.location="../bayar.php?id=' . time() . '";</script>';
}

if ($_GET['id'] == 'konfirmasi') {

    $data[] = $_POST['id_booking'];
    $data[] = $_POST['no_konfirmasi'];
    $data[] = $_POST['pemesan'];
    $data[] = $_POST['divisi'];
    $data[] = $_POST['tgl'];

    $sql = "INSERT INTO `konfirmasi`(`id_booking`, `no_konfirmasi`, `pemesan`, `divisi`, `tanggal`) 
    VALUES (?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    $data2[] = 'Sedang di proses';
    $data2[] = $_POST['id_booking'];
    $sql2 = "UPDATE `booking` SET `konfirmasi_booking`= ? WHERE id_booking= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Kirim Sukses , Booking anda sedang diproses");history.go(-2);</script>';
}
