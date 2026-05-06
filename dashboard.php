<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit();
}
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
            <a class="nav-link" href="home1.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu1.php">Menu</a>
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


<section class="dashboard">
    <p>Selamat datang kembali!</p>
    <h3>Halo, <?php echo $_SESSION['nama']; ?>!</h3>
</section>

<section class="informasi">
  <div class="container text-center">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-6">
      <div class="card p-3">
        <h5>Informasi Akun</h5>
        <table class="table">
        <tbody>
          <tr>
              <td>Nama</td>
              <td class="text-end"><?php echo $_SESSION['nama']; ?></td>
          </tr>
          <tr>
              <td>Email</td>
              <td class="text-end"><?php echo $_SESSION['email']; ?></td>
          </tr>
          <tr>
              <td>No. HP</td>
              <td class="text-end"><?php echo $_SESSION['no_hp']; ?></td>
          </tr>
          <tr>
              <td>Alamat</td>
              <td class="text-end"><?php echo $_SESSION['alamat']; ?></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    </div>
  </div>
</div>
</section>

<section class="pilihan">
  <a href="menu1.php" class="btn btn-primary">Lihat Menu</a>
  <a href="logout.php" class="btn btn-danger">Logout</a>
</section> 

    
    

<footer class="footer">
    <div class="container text-center">
        <p>&copy; 2026 Dessert. All rights reserved.</p>
    </div>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>