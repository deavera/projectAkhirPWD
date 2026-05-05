<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dessert</title>
    <link rel="stylesheet" href="ubahvera.css">
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
            <a class="nav-link" href="contact.php">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php.php">Admin</a>
          </li>
        </ul>
        <form class="d-flex" role="search">

        
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>


<h2>
    Daftar Pesanan Masuk
</h2>
<table class="table">
  <thead class="table-light">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Username</th>
        <th scope="col">Produk</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Total Harga</th>
        <th scope="col">Tanggal Pesanan</th>
        <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT users.username, orders.nama_produk, orders.jumlah, orders.total_harga, orders.tanggal_pesanan, orders.status FROM users INNER JOIN orders ON user_id = orders.id_user");
    while ($data = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['nama_produk']; ?></td>
        <td><?php echo $data['jumlah']; ?></td>
        <td>Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
        <td><?php echo $data['tanggal_pesanan']; ?></td>
        <td><?php echo $data['status']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    

<footer class="footer">
    <div class="container text-center">
        <p>&copy; 2026 Dessert. All rights reserved.</p>
    </div>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>