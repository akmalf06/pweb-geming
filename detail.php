<?php
    include 'backend/registration.php';
    $id = $_GET['id'];
    $data = show($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/vendor/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/vendor/fontawesome/all.min.css">
    <link rel="stylesheet" href="asset/style/style.css"/>
    <title>Buat Ajuan</title>
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-semibold fs-4" href="index.php">PPDB SMAN 2 Jeruk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="tentang-ppdb">Tentang PPDB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mekanisme-ppdb">Mekanisme PPDB</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container d-flex justify-content-center">
        <div class="w-75 py-5">
            <div class="d-flex w-100 justify-content-center">
                <h1>Detail Data Pendaftar</h1>
            </div>
            <form action="backend/api/registration/store.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" readonly value="<?php echo $data['name'] ?>" name="name" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <input type="text" name="gender" readonly value="<?php echo $data['gender'] ?>" class="form-control" id="birth_location">
                </div>
                <div class="mb-3">
                    <label for="birth_location" class="form-label">Tempat Lahir</label>
                    <input type="text" name="birth_location" readonly value="<?php echo $data['birth_location'] ?>" class="form-control" id="birth_location" >
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" readonly value="<?php echo $data['birth_date'] ?>" class="form-control" id="birth_date">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" readonly id="address" rows="3"><?php echo $data['address'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="student_number" class="form-label">NISN</label>
                    <input type="text" name="student_number" readonly value="<?php echo $data['student_number'] ?>" class="form-control" id="student_number">
                </div>
                <div class="mb-3">
                    <label for="junior_school" class="form-label">Asal Sekolah</label>
                    <input type="text" name="junior_school" readonly value="<?php echo $data['junior_school'] ?>" class="form-control" id="junior_school">
                </div>
                <div class="mb-3">
                    <label for="report_file" class="form-label">Dokumen Rapor</label>
                    <div class="w-100 d-flex justify-content-center">
                        <img class="w-75" src="<?php echo 'asset/images/registrations/'.$data['report_file'] ?>" alt="gambar">
                    </div>
                </div>
                <div class="w-full d-flex justify-content-center">
                    <a href="<?php echo "edit.php?id=".$id ?>" type="button" class="btn btn-primary">Ubah Data</a>
                </div>
            </form>
        </div>
    </div>
    <script src="asset/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="asset/vendor/fontawesome/all.min.js"></script>
    <script src="asset/vendor/jquery/jquery-3.6.3.min.js"></script>
</body>

</html>