<?php
include "config.php";

?>
<title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Manajemen Mata Kuliah</a>

        </div>
    </nav>
    <div class="container-md container-">
        <div class="row mt-5">
            <div class="col-xl-4 col-l-5 col-md-6 col-sm-12 my-2">
                <!-- Button trigger modal -->
                <a type="button" class="tambah text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class="text-center">
                        <h5 class="card-title my-5"><strong>+</strong> Tambah matkul</h5>
                    </div>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Mata Kuliah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="controller/ctrl_tambah.php" method="post">
                                    <div class="mb-3">
                                        <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
                                        <input type="text" class="form-control" name="nama_matkul">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi_matkul" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi_matkul" class="form-control" rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php

            $query = mysqli_query($conn, "SELECT * FROM mata_kuliah");
            foreach ($query as $key => $value) {
                $id_matkul = $value['id'];
                $cek = mysqli_query($conn, "SELECT * FROM materi WHERE id_mk = '$id_matkul'");
                $count = mysqli_num_rows($cek);
            ?>
                <div class="col-xl-4 col-l-5 col-md-6 col-sm-12 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="detailMatkul.php?id=<?= $value['id'] ?>"><?= $value['nama_mk'] ?></a></h5>
                            <p class="card-text"><?= $value['desk_mk'] ?></p>
                        </div>
                        <div class="card-footer pb-0">
                            <p class="text-center">Total pertemuan : <?= $count ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>