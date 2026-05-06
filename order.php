<?php
$nama = $_GET['nama'];
$harga = $_GET['harga'];
$gambar = $_GET['gambar'];
$keterangan = $_GET['keterangan'];
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order - Dessert</title>
  <link rel="stylesheet" href="ubahM.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dessert</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link" href="home1.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="menu1.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
        <ul class="navbar-nav nav-right my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- ISI HALAMAN -->
<div class="container mt-5">
  <div class="row align-items-start">

    <!-- KIRI: Gambar produk -->
    <div class="col-md-6 text-center">
      <img src="<?php echo $gambar; ?>" class="img-fluid gambar-order">
    </div>

    <!-- KANAN: Detail produk -->
    <div class="col-md-6 mt-3">
      <h2><?php echo $nama; ?></h2>
      <h4 class="text-danger">Rp <?php echo $harga; ?></h4>
      <p><?php echo $keterangan; ?></p>
      <hr>

      <?php if(isset($_POST['jumlah'])){
        $jumlah = $_POST['jumlah'];
        $total = $harga * $jumlah;

        $diskon = 0;
        if($total > 50000){
          $diskon = 5000;
        }

        $bayar = $total - $diskon;
      ?>

        <!-- Ringkasan setelah pesan -->
        <div class="card p-3 mb-3">
          <p class="mb-1">Jumlah Pesan: <b><?php echo $jumlah; ?></b></p>
          <p class="mb-0">Total: <b class="text-danger">Rp <?php echo $total; ?></b></p>
        </div>

        <!-- Tombol lihat struk (Bootstrap modal) -->
        <button type="button" class="menu-btn" data-bs-toggle="modal" data-bs-target="#modalStruk">
          Lihat Struk
        </button>

        <a href="menu.php" class="menu-btn mt-2">
          Kembali ke Menu
        </a>

      <?php } else { ?>

        <!-- Form jumlah pesan -->
        <form method="post">
          <label class="fw-bold mb-1">Jumlah Pesan</label><br>
          <input type="number" name="jumlah" class="form-control w-25" min="1" required>
          <button type="submit" class="menu-btn mt-3">Pesan</button>
        </form>

      <?php } ?>

    </div>
  </div>
</div>
<footer class="footer">
    <div class="container text-center">
        <p>&copy; 2026 Dessert. All rights reserved.</p>
    </div>
</footer>

<!-- MODAL STRUK (Bootstrap) -->
<?php if(isset($_POST['jumlah'])){ ?>
<div class="modal fade" id="modalStruk" tabindex="-1" aria-labelledby="labelStruk" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="labelStruk">Struk Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <table class="table">
          <tr>
            <td>Produk</td>
            <td><b><?php echo $nama; ?></b></td>
          </tr>
          <tr>
            <td>Harga Satuan</td>
            <td>Rp <?php echo $harga; ?></td>
          </tr>
          <tr>
            <td>Jumlah</td>
            <td><?php echo $jumlah; ?></td>
          </tr>
          <tr>
            <td>Total</td>
            <td>Rp <?php echo $total; ?></td>
          </tr>
          <tr>
            <td>Diskon</td>
            <td>- Rp <?php echo $diskon; ?></td>
          </tr>
          <tr>
            <td><b>Total Bayar</b></td>
            <td><b class="text-danger">Rp <?php echo $bayar; ?></b></td>
          </tr>
        </table>

        <?php if($diskon > 0){ ?>
          <div class="alert alert-warning">
            Kamu dapat diskon Rp 5.000 karena belanja di atas Rp 50.000!
          </div>
        <?php } ?>
      </div>

      <div class="modal-footer">
        <a href="login.php" class="menu-btn">Login untuk Konfirmasi</a>
      </div>

    </div>
  </div>
</div>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>