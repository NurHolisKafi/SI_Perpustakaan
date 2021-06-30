<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <style>
        body {
            
            background: url("assets/image/bg2.png");
            background-size: cover;
        }
        .btn {
            color: #fff;
            font-size: 14px;
            margin-right: 5px; 
        }

        .container .card {
            background: transparent;
            outline-width: 0px;
            outline: transparent;
            color: #ff6435;  
        }
        .label{
            color: #ff6435; 
        }

        .nav{
            font-size: 20px;
            margin-left: 10px;
            color: #ff6435; 
        }
        .cari{
            position: absolute;
            margin-left: 73%;
            margin-bottom: 10px;
        }
        .bar{
            position: absolute;
            margin-left: 55%;
            height: 36px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-red bg-dark">
        <a class="navbar-brand nav" href="#">Perpustakaan | </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link label" href="index.php?page=anggota&aksi=editProfile">Edit Profil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link label" href="index.php?page=anggota&aksi=lihatpinjambuku">Lihat Buku Yang Dipinjam</a>
                </li>
            </ul>  
        </div>   
        <div class="form-inline">
            <a class=" btn btn-danger" href="index.php?page=auth&aksi=logout">Logout</a>
        </div>
        
    </nav>

    <center>
        <div class="container">
            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Daftar Buku</h2>
                </div>
                <div class="row">
                <div class="col-sm-4">
                <form role="cari" action="index.php?page=anggota&aksi=cari" method="POST">
                <div class="form-group">
                    <label></label>
                <td><input class="bar" type="text" name="judul_buku" class="form-control"></td> 
                <td>
                    <button type="submit" class="btn btn-success btn-block cari">Search</button>
                </td>    
                </div>
                <br>
                </form> 
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td class="label">No</td>
                                <td class="label">Judul</td>
                                <td class="label">Penerbit</td>
                                <td class="label">Pengarang</td>
                                <td class="label">Pilih</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        foreach($data as $row) :?>
                            <tr>
                                <td class="label"><?=$no ?></td>
                                <td class="label"><?=$row['judul_buku'] ?></td>
                                <td class="label"><?=$row['nama_penerbit'] ?></td>
                                <td class="label"><?=$row['pengarang'] ?></td>
                                <td>
                                    <a href="index.php?page=anggota&aksi=cekBuku&id_buku=<?=$row['id'] ?>">
                                        <button type="submit" class="btn btn-success btn-lg btn-block ">Pinjam</button>
                                    </a>
                                    
                                    <a href="index.php?page=anggota&aksi=batalpinjam&id_buku=<?=$row['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-lg btn-block">Batal</button>
                                    </a>
                                </td>
                                
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