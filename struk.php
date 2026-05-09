<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}

$id_pesanan = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan' AND user_id = '{$_SESSION['id']}'");
$data = mysqli_fetch_assoc($query);
?>