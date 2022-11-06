<?php
include "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM mata_kuliah WHERE id = '$id'");
$query = mysqli_fetch_array($query);
?>
<title>Detail Mata Kuliah</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Manajemen Mata Kuliah</a>
        </div>
    </nav>
    <div class="container">
        <h2 class="title mt-2"><?= $query['nama_mk'] ?></h2>
        <p class="subtitle"><?= $query['desk_mk'] ?></p>
        <hr>
        <div class="row mt-5">
            <div class="col-xl-4 col-l-5 col-md-6 col-sm-12 my-2">
                <!-- Button trigger modal -->
                <a type="button" class="tambah text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <div class="d-flex justify-content-center align-items-center">
                        <h5 class="card-title "><strong>+</strong> Tambah Materi</h5>
                    </div>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Materi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="controller/ctrl_tambahMateri.php" method="post">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Deskripsi</label>
                                        <input name="tanggal" class="form-control" type="date">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php

            $query = mysqli_query($conn, "SELECT * FROM materi WHERE id_mk = '$id'");
            foreach ($query as $key => $value) {
                $edit_id = $value['id'];
            ?>
                <div class="col-xl-4 col-l-5 col-md-6 col-sm-12 my-2">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-end">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $edit_id ?>">Edit</a>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#hapus<?= $edit_id ?>">Hapus</a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['judul'] ?></h5>
                            <p class="card-text"><?= $value['deskripsi'] ?></p>

                        </div>
                        <div class="card-footer pb-0">
                            <p class="text-center"><?= $value['tanggal'] ?></p>

                        </div>
                    </div>
                    <!-- Modal edit-->
                    <div class="modal fade" id="edit<?= $edit_id ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Materi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="controller/ctrl_updateMateri.php" method="post">
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" name="judul" value="<?= $value['judul'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="5"><?= $value['deskripsi'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input name="tanggal" class="form-control" type="date" value="<?= $value['tanggal'] ?>">
                                            <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
                                            <input type="hidden" name="id_matkul" value=" <?= $id ?>">
                                        </div>
                                        <button type=" submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal hapus -->
                    <div class="modal fade" id="hapus<?= $edit_id ?>" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Materi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Yakin untuk menghapus <?= $value['judul'] ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <a href="./controller/ctrl_hapusMateri.php?id=<?= $edit_id ?>&id_matkul=<?= $id ?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>