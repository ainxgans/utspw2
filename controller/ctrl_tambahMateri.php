<?php
include "../config.php";
$id = $_POST['id'];
$judul = $_POST['judul'];
$desk = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$query = mysqli_query($conn, "INSERT INTO materi (id_mk, judul,deskripsi, tanggal) VALUES ('$id','$judul','$desk', '$tanggal')");
if ($query) {
    header("location:../detailMatkul.php?id=$id");
}
