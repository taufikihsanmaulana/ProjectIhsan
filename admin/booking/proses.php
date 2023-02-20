<?php

require '../../koneksi/koneksi.php';

if ($_GET['id'] == 'konfirmasi') {
    $data2[] = $_POST['supir'];
    $data2[] = $_POST['go_time'];
    $data2[] = $_POST['status_booking'];
    $data2[] = $_POST['status_konfirmasi'];
    $data2[] = $_POST['id_booking'];
    $sql2 = "UPDATE `booking` SET `supir`= ?,  `go_time`= ?,  `status_booking`= ?, `konfirmasi_booking`= ? WHERE id_booking= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    $data3[] = $_POST['status_mobil'];
    $data3[] = $_POST['id_mobil'];
    $sql3 = "UPDATE `mobil` SET `status_mobil`= ? WHERE id_mobil= ?";
    $row3 = $koneksi->prepare($sql3);
    $row3->execute($data3);

    echo '<script>alert("Booking dan Status  Mobil, Sudah di terima");history.go(-1);</script>';
}
