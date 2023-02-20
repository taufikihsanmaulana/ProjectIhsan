<?php

session_start();
require 'koneksi/koneksi.php';
include 'header.php';
if (empty($_SESSION['USER'])) {
    echo '<script>alert("Harap Login");window.location="index.php"</script>';
}
$kode_booking = $_GET['id'];
$hasil = $koneksi->query("SELECT * FROM booking WHERE kode_booking = '$kode_booking'")->fetch();

$id = $hasil['id_mobil'];
$isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="koneksi/proses.php?id=konfirmasi">
                        <table class="table">
                            <tr>
                                <td>Kode Booking</td>
                                <td> :</td>
                                <td><?php echo $hasil['kode_booking']; ?></td>
                            </tr>
                            <tr>
                                <td>No Konfirmasi</td>
                                <td> :</td>
                                <td><input type="text" name="no_konfirmasi" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Pemesan</td>
                                <td> :</td>
                                <td><input type="text" name="pemesan" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Divisi</td>
                                <td> :</td>
                                <td><input type="text" name="divisi" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Konfirmasi</td>
                                <td> :</td>
                                <td><input type="date" name="tgl" required class="form-control"></td>
                            </tr>
                        </table>
                        <input type="hidden" name="id_booking" value="<?php echo $hasil['id_booking']; ?>">
                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<?php include 'footer.php'; ?>