<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\style.css">
</head>

<body>
<a class=" btn btn-primary " href="index.php?page=auth&aksi=loginAdmin">kembali</a>
    <center>
        <div class="container">
            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Daftar Buku</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Judul</td>
                                <td>Penerbit</td>
                                <td>Pengarang</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        foreach($data as $row) :?>
                            <tr>
                                <td><?=$no ?></td>
                                <td><?=$row['judul_buku'] ?></td>
                                <td><?=$row['nama_penerbit'] ?></td>
                                <td><?=$row['pengarang'] ?></td>
                            </tr>
                        <?php $no++;
                        endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </center>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>
</html>