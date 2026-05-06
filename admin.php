<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Dessert</title>
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
            <a class="nav-link active" href="home1.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu1.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order.php">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin.php">Admin</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="isi-halaman">

    <?php
    $total_user    = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM users"));
    $total_pesanan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pesanan"));
    $query_pending = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE status='pending'");
    $total_pending = mysqli_num_rows($query_pending);
    ?>

    <div class="container mt-4">
      <div class="row">

        <div class="col-md-4 mb-4">
          <div class="card kotak-stat text-center p-3">
            <h2 class="angka-stat"><?php echo $total_user; ?></h2>
            <p class="tulisan-stat">Total User</p>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card kotak-stat text-center p-3">
            <h2 class="angka-stat"><?php echo $total_pesanan; ?></h2>
            <p class="tulisan-stat">Total Pesanan</p>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card kotak-stat text-center p-3">
            <h2 class="angka-stat"><?php echo $total_pending; ?></h2>
            <p class="tulisan-stat">Pesanan Pending</p>
          </div>
        </div>

      </div>
    </div>

    <div class="container mt-2 mb-5">
      <h4 class="judul-tabel mb-3">Daftar Pesanan Masuk</h4>
      <table class="table table-bordered table-hover">
        <thead class="kepala-tabel">
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal Pesanan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT users.nama, pesanan.nama_produk, pesanan.jumlah, pesanan.total_bayar, pesanan.tanggal, pesanan.status FROM pesanan INNER JOIN users ON pesanan.user_id = users.id");
          if(mysqli_num_rows($query) > 0){
            while($data = mysqli_fetch_assoc($query)){ ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['nama_produk']; ?></td>
              <td><?php echo $data['jumlah']; ?></td>
              <td>Rp <?php echo $data['total_bayar']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
              <td><?php echo $data['status']; ?></td>
            </tr>
            <?php }
          } else { ?>
            <tr>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>Belum ada pesanan masuk.</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

  <footer class="footer">
    <div class="container text-center">
      <p>&copy; 2026 Dessert. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>