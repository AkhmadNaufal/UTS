<?php

$host="localhost";
$user="root";
$password="";
$db="crud";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error()); 
}

$id_kamar = "";
$tipe_kamar = "";
$fasilitas_kamar = "";
$sistem_pembayaran = "";
$sukses = "";
$error  = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
}else {
  $op = "";
}

if ($op == 'ubah'){
  $id_kamar = $_GET['id_kamar'];
  $query = "select * from kamar_kos where id_kamar = '$id_kamar'";
  $ubah = mysqli_query($kon, $query);
  $tampil = mysqli_fetch_array($ubah);
  $id_kamar = $tampil ['id_kamar'];
  $tipe_kamar = $tampil ['tipe_kamar'];
  $fasilitas_kamar = $tampil ['fasilitas_kamar'];
  $sistem_pembayaran = $tampil ['sistem_pembayaran'];

  if ($id_kamar == ''){
    $error = "Data Tidak Ditemukan";
  }
}

if ($op == 'hapus'){
  $id_kamar = $_GET['id_kamar'];
  $query = "delete from kamar_kos where id_kamar = '$id_kamar'";
  $hapus = mysqli_query($kon, $query);
  if ($hapus) {
    $sukses = "Data Berhasil Di Hapus";
    $id_kamar = "";
  }else {
    $error = "Data Gagal Di Hapus";
  }
}

if (isset($_POST['simpan'])){
  $id_kamar = $_POST['id_kamar'];
  $tipe_kamar = $_POST['tipe_kamar'];
  $fasilitas_kamar = $_POST['fasilitas_kamar'];
  $sistem_pembayaran = $_POST['sistem_pembayaran'];
  
  if ($id_kamar && $tipe_kamar && $fasilitas_kamar && $sistem_pembayaran) {
    if ($op == 'ubah'){
      $query = "update kamar_kos set tipe_kamar = '$tipe_kamar', fasilitas_kamar = '$fasilitas_kamar', sistem_pembayaran = '$sistem_pembayaran' where id_kamar = '$id_kamar'";
      $ubah = mysqli_query($kon, $query);
      if ($ubah) {
        $sukses = "Data Berhasil Di Update";
        $id_kamar = "";
        $tipe_kamar = "";
        $fasilitas_kamar = "";
        $sistem_pembayaran = "";
    }else {
      $error = "Data gagal Disimpan";
    }
  }else{
    $query = "insert into kamar_kos values ('$id_kamar', '$tipe_kamar', '$fasilitas_kamar', '$sistem_pembayaran')";
    $simpan = mysqli_query($kon, $query);
    if ($simpan) {
      $sukses = "Data Berhasil Di Simpan";
      $id_kamar = "";
      $tipe_kamar = "";
      $fasilitas_kamar = "";
      $sistem_pembayaran = "";
    }else {
      $error = "Data Gagal Di Simpan";
    }
  }
  }else {
    $error = "Silahkan Masukkan Semua Data";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamar kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .mx-auto { width : 800px; }
        .card { margin-top: 10px;}
    </style>
</head>
<body>

<div class="mx-auto">
<div class="card">
  <div class="card-header text-white bg-primary">
    create / edit data
  </div>
  <div class="card-body">
    <?php
    if ($sukses){
      ?>
      <div class="alert alert-succes" role="alert">
        <?php echo $sukses; ?>
      </div>
      <?php
    }
    if ($error) {
      ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
      </div>
      <?php
    }
    ?>
    <form action="" method="POST">
    <div class="mb-3 row">
    <label for="id_kamar" class="col-sm-2 col-form-label">id_kamar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="id_kamar" name="id_kamar" value="<?php echo $id_kamar ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="tipe_kamar" class="col-sm-2 col-form-label">tipe_kamar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" value="<?php echo $tipe_kamar ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="fasilitas_kamar" class="col-sm-2 col-form-label">fasilitas_kamar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fasilitas_kamar" name="fasilitas_kamar" value="<?php echo $fasilitas_kamar ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="sistem_pembayaran" class="col-sm-2 col-form-label">sistem_pembayaran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sistem_pembayaran" name="sistem_pembayaran" value="<?php echo $sistem_pembayaran ?>">
    </div>
  </div>
  <div class="col-12" align="right">
    <input type="submit" name="simpan" value="simpan data" class="btn btn-primary">
  </div>
    </form>
  </div>
</div>
<div class="card">
  <div class="card-header text-white bg-primary">
    Data Kamar Kos
  </div>
  <div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id_kamar</th>
      <th scope="col">tipe_kamar</th>
      <th scope="col">fasilitas_kamar</th>
      <th scope="col">sistem_pembayaran</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
   <?php
    $query = "select * from kamar_kos order by id_kamar asc";
    $tampil = mysqli_query($kon, $query);
    $urut = 1;
    while ($result = mysqli_fetch_array($tampil)) {
      $id_kamar = $result ['id_kamar'];
      $tipe_kamar = $result ['tipe_kamar'];
      $fasilitas_kamar = $result ['fasilitas_kamar'];
      $sistem_pembayaran = $result ['sistem_pembayaran'];
    
   ?>
   <tr>
    <th scope="row"><?php echo $urut++; 
    ?></th>
    <td scope="row"><?php echo $id_kamar; ?></td>
    <td scope="row"><?php echo $tipe_kamar; ?></td>
    <td scope="row"><?php echo $fasilitas_kamar; ?></td>
    <td scope="row"><?php echo $sistem_pembayaran; ?></td>
    <td scope="row">
      <a href="index.php?op=ubah&id_kamar=<?php echo $id_kamar ?>"><button type="button" class="btn btn-warning">Edit</button></a>
      <a href="index.php?op=hapus&id_kamar=<?php echo $id_kamar ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><button type="button" class="btn btn-danger">Hapus</button></a>
    </td>
   </tr>
   <?php
   }
   ?>

  </tbody>
</table>
  </div>
</div>
</div>
    
</body>
</html>