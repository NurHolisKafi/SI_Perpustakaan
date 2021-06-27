<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Data Peminjam</title>
    <style>
        body {
            
            background: url("assets/image/bg2.png");
            background-size: cover;
        }
        .btn {
            color: #ff6435;
            background-color: #170f15;
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
                    <a class="nav-link label" href="index.php?page=admin&aksi=tambahbuku">Tambah Buku</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link label" href="index.php?page=admin&aksi=view">Lihat Buku</a>
                </li>
            </ul>  
        </div>   
        <div class="form-inline">
            <a class="btn btn-dark mr-5" href="index.php?page=auth&aksi=logout">Logout</a>
        </div>
        
    </nav>
                        
    <center>
        <div class="container">
            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Daftar Peminjam Buku</h2>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class= "label">No.</th>
                                <th class= "label">Nama</th>
                                <th class= "label">No Telp</th>
                                <th class= "label">Alamat</th>
                                <th class= "label">Buku Yang Dipinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class= "label">1</td>
                                <td class= "label">Alexander Bambang</td>
                                <td class= "label">812345678</td>
                                <td class= "label">Surabaya</td>
                                <td class= "label"><a href="#" class="btn btn-outline-dark">Lihat</a></td>
                            </tr>
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