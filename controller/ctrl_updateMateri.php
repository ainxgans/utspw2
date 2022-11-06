<?php
include "../config.php";
$id = $_POST['id_matkul'];
$id_materi = $_POST['id_edit'];
$judul = $_POST['judul'];
$desk = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$query = mysqli_query($conn, "UPDATE materi SET judul ='$judul', deskripsi = '$desk', tanggal = '$tanggal' WHERE id = '$id'");
if ($query) {
    header("location:../detailMatkul.php?id=$id");
}
