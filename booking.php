<?php
/*
  | Source Code Aplikasi Rental Mobil PHP & MySQL
  | 
  | @package   : rental_mobil
  | @file	   : bookinh.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-mobil-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */

session_start();
require 'koneksi/koneksi.php';
include 'header.php';
if (empty($_SESSION['USER'])) {
  echo '<script>alert("Harap login !");window.location="index.php"</script>';
}
$id = $_GET['id'];
$isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
?>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <img src="assets/image/<?php echo $isi['gambar']; ?>" class="card-img-top" style="height:200px;">
        <div class="card-body" style="background:#ddd">
          <h5 class="card-title"><?php echo $isi['nama_mobil']; ?></h5>
        </div>
        <ul class="list-group list-group-flush">

          <?php if ($isi['status_mobil'] == 'Tersedia') { ?>
            <li class="list-group-item bg-primary text-white">
              <i class="fa fa-check"></i> Available
            </li>
          <?php } else { ?>
            <li class="list-group-item bg-danger text-white">
              <i class="fa fa-close"></i> Not Available
            </li>
          <?php } ?>
          <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free E-toll 50k</li>
        </ul>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="card">
        <div class="card-body">
          <form method="post" action="koneksi/proses.php?id=booking">
            <div class="form-group">
              <label for="">NIK</label>
              <input type="text" name="nik" id="" required class="form-control" placeholder="NIK Anda">
            </div>
            <div class="form-group">
              <label for="">Pemesan</label>
              <input type="text" name="pemesan" id="" required class="form-control" placeholder="Nama Pemesan">
            </div>
            <div class="form-group">
              <label for="">Divisi</label>
              <select class="form-group col-sm-12" name="divisi">
                <option value="disabled selected">Pilih Divisi</option>
                <option <?php if ($hasil['divisi'] == 'Accounting/Finance') {
                          echo 'selected';
                        } ?>>Accounting/Finance</option>
                <option <?php if ($hasil['divisi'] == 'HRD-GA') {
                          echo 'selected';
                        } ?>>HRD-GA</option>
                <option <?php if ($hasil['divisi'] == 'System') {
                          echo 'selected';
                        } ?>>System</option>
                <option <?php if ($hasil['divisi'] == 'PD/MFD') {
                          echo 'selected';
                        } ?>>PD/MFD</option>
                <option <?php if ($hasil['divisi'] == 'Machining') {
                          echo 'selected';
                        } ?>>Machining</option>
                <option <?php if ($hasil['divisi'] == 'Assembling') {
                          echo 'selected';
                        } ?>>Assembling</option>
                <option <?php if ($hasil['divisi'] == 'Metal Stamping') {
                          echo 'selected';
                        } ?>>Metal Stamping</option>
                <option <?php if ($hasil['divisi'] == 'Logistic') {
                          echo 'selected';
                        } ?>>Logistic</option>
                <option <?php if ($hasil['divisi'] == 'Sales') {
                          echo 'selected';
                        } ?>>Sales</option>
                <option <?php if ($hasil['divisi'] == 'Tooling Design') {
                          echo 'selected';
                        } ?>>Tooling Design</option>
                <option <?php if ($hasil['divisi'] == 'Plastic Injection') {
                          echo 'selected';
                        } ?>>Plastic Injection</option>
              </select>
            </div>
            <div class="form-group ">
              <label for="">Tanggal Pesan</label>
              <input type="date" name="tgl_pesan" id="" required class="form-control" placeholder="Tanggal Pesan">
            </div>
            <div class="form-group">
              <label for="">Tanggal Pake</label>
              <input type="date" name="tgl_pake" id="" required class="form-control" placeholder="Tanggal Pake">
            </div>
            <div class="form-group">
              <label for="">Lama Pake</label>
              <input type="number" name="lama_pake" id="" required class="form-control" placeholder="Lama Pake">
            </div>
            <div class="form-group ">
              <label for="">Kota</label>
              <select class="form-group col-sm-12" name="kota">
                <option value="disabled selected">Pilih Kota</option>
                <option <?php if ($hasil['kota'] == 'Bekasi') {
                          echo 'selected';
                        } ?>>Bekasi</option>
                <option <?php if ($hasil['kota'] == 'Cikarang') {
                          echo 'selected';
                        } ?>>Cikarang</option>
                <option <?php if ($hasil['kota'] == 'Cibitung') {
                          echo 'selected';
                        } ?>>Cibitung</option>
                <option <?php if ($hasil['kota'] == 'Karawang Timur') {
                          echo 'selected';
                        } ?>>Karawang Timur</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Tujuan</label>
              <select class="form-group col-sm-12" name="tujuan">
                <option value="disabled selected">Pilih Tujuan</option>
                <option <?php if ($hasil['tujuan'] == 'Dinas Tenaga Kerja Kota Bekasi') {
                          echo 'selected';
                        } ?>>Dinas Tenaga Kerja Kota Bekasi</option>
                <option <?php if ($hasil['tujuan'] == 'BPJS Kesehatan') {
                          echo 'selected';
                        } ?>>BPJS Kesehatan</option>
                <option <?php if ($hasil['tujuan'] == 'BPJS Ketenagakerjaan') {
                          echo 'selected';
                        } ?>>BPJS Ketenagakerjaan</option>
                <option <?php if ($hasil['tujuan'] == 'PT. Astra Toyota') {
                          echo 'selected';
                        } ?>>PT. Astra Toyota</option>
                <option <?php if ($hasil['tujuan'] == 'PT. Astra Daihatsu') {
                          echo 'selected';
                        } ?>>PT. Astra Daihatsu</option>
                <option <?php if ($hasil['tujuan'] == 'PT. CKU') {
                          echo 'selected';
                        } ?>>PT. CKU</option>
                <option <?php if ($hasil['tujuan'] == 'PT. YMMA') {
                          echo 'selected';
                        } ?>>PT. YMMA</option>
                <option <?php if ($hasil['tujuan'] == 'PT. Indonesia Epson Industry ') {
                          echo 'selected';
                        } ?>>PT. Indonesia Epson Industry</option>
                <option <?php if ($hasil['tujuan'] == 'PT. Denso') {
                          echo 'selected';
                        } ?>>PT. Denso</option>
                <option <?php if ($hasil['tujuan'] == 'PT. JTEK') {
                          echo 'selected';
                        } ?>>PT. CKU</option>
                <option <?php if ($hasil['tujuan'] == 'PT. SSP') {
                          echo 'selected';
                        } ?>>PT. SSP</option>
                <option <?php if ($hasil['tujuan'] == 'PT. PLN Persero') {
                          echo 'selected';
                        } ?>>PT. PLN Persero</option>
                <option <?php if ($hasil['tujuan'] == 'PT. JVC') {
                          echo 'selected';
                        } ?>>PT. JVC</option>
                <option <?php if ($hasil['tujuan'] == 'PT. SHIN HEUNG') {
                          echo 'selected';
                        } ?>>PT. SHIN HEUNG</option>
                <option <?php if ($hasil['tujuan'] == 'PT. SONY LTE') {
                          echo 'selected';
                        } ?>>PT. SONY LTE</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Alamat</label>
              <input type="text" name="alamat" id="" required class="form-control" placeholder="alamat">
            </div>
            <div class="form-group">
              <label for="">Keperluan</label>
              <select class="form-group col-sm-12" name="keperluan">
                <option value="disabled selected">Pilih Keperluan</option>
                <option <?php if ($hasil['keperluan'] == 'Dokumen & Pembayaran') {
                          echo 'selected';
                        } ?>>Dokumen & Pembayaran</option>
                <option <?php if ($hasil['keperluan'] == 'Repair/Trial') {
                          echo 'selected';
                        } ?>>Repair/Trial</option>
                <option <?php if ($hasil['keperluan'] == 'Meeting') {
                          echo 'selected';
                        } ?>>Meeting</option>
                <option <?php if ($hasil['keperluan'] == 'Kirim Barang/Sample') {
                          echo 'selected';
                        } ?>>Kirim Barang/Sample</option>
                <option <?php if ($hasil['keperluan'] == 'Rework(Antar/Jemput Karyawan') {
                          echo 'selected';
                        } ?>>Rework(Antar/Jemput Karyawan)</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Jumlah Orang</label>
              <input type="number" name="jml_orang" id="" required class="form-control" placeholder="Jumlah Orang">
            </div>
            <div class="form-group">
              <label for="">Jumlah Barang</label>
              <input type="number" name="jml_barang" id="" required class="form-control" placeholder="Jumlah Barang">
            </div>
            <div class="form-group">
              <label for="">ETD Padma</label>
              <input type="time" name="etd_padma" id="" required class="form-control" placeholder="ETD Padma">
            </div>
            <div class="form-group">
              <label for="">ETA Tujuan</label>
              <input type="time" name="eta_tujuan" id="" required class="form-control" placeholder="ETA Tujuan">
            </div>

            <input type="hidden" value="<?php echo $_SESSION['USER']['id_login']; ?>" name="id_login">
            <input type="hidden" value="<?php echo $isi['id_mobil']; ?>" name="id_mobil">
            <hr />
            <?php if ($isi['status_mobil'] == 'Tersedia') { ?>
              <button type="submit" class="btn btn-primary float-right">Booking Now</button>
            <?php } else { ?>
              <button type="submit" class="btn btn-danger float-right" disabled>Booking Now</button>
            <?php } ?>
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