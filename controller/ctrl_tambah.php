<?php
include "../config.php";
$nama_mk = $_POST['nama_matkul'];
$desk_mk = $_POST['deskripsi_matkul'];
$query = mysqli_query($conn, "INSERT INTO mata_kuliah (nama_mk,desk_mk) VALUES ('$nama_mk','$desk_mk')");
if ($query) {
    header("location:../");
}
