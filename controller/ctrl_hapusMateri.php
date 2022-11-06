<?php
include "../config.php";
$id_materi = $_GET['id'];
$id_matkul = $_GET['id_matkul'];
$query = mysqli_query($conn, "DELETE FROM materi WHERE id = '$id_materi'");
if ($query) {
    header("location:../detailMatkul.php?id=$id_matkul");
}
