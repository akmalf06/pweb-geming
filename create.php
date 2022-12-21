<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/vendor/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/vendor/fontawesome/all.min.css">
    <link rel="stylesheet" href="asset/style/style.css" />
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
                <h1>Tambahkan Pendaftaran Calon Peserta Didik</h1>
            </div>
            <form id="form-create" action="backend/api/registration/store.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" id="nama" placeholder="Masukkan nama calon peserta didik">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="" selected>Pilih jenis kelamin calon peserta didik</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="birth_location" class="form-label">Tempat Lahir</label>
                    <input type="text" name="birth_location" class="form-control" id="birth_location" placeholder="Masukkan tempat lahir calon peserta didik">
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control" id="birth_date" placeholder="Masukkan tanggal lahir calon peserta didik">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="student_number" class="form-label">NISN</label>
                    <input type="text" name="student_number" class="form-control" id="student_number" placeholder="Masukkan nisn calon peserta didik">
                </div>
                <div class="mb-3">
                    <label for="junior_school" class="form-label">Asal Sekolah</label>
                    <input type="text" name="junior_school" class="form-control" id="junior_school" placeholder="Masukkan asal sekolah calon peserta didik">
                </div>
                <div class="mb-3">
                    <label for="report_file" class="form-label">Dokumen Rapor</label>
                    <input type="file" name="report_file" class="form-control" id="report_file">
                </div>
                <div class="w-full d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Tambahkan data</button>
                </div>
            </form>
        </div>
    </div>
    <script src="asset/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="asset/vendor/fontawesome/all.min.js"></script>
    <script src="asset/vendor/jquery/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form-create").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 64,
                    },
                    gender: {
                        required: true
                        
                    },
                    birth_date: {
                        date: true,
                    },
                    birth_location: {
                        required: true,
                        maxLength: 64
                    },
                    address: {
                        required: true,
                        maxLength: 128
                    },
                    student_number:{
                        required: true,
                        minLength: 10,
                        maxLength: 10
                    },
                    junior_school: {
                        required: true,
                        maxLength: 64
                    }
                },
                messages: {
                    student_number: {
                        maxlength: "panjang nisn harus tepat 10 karakter",
                        maxlength: "panjang nisn harus tepat 10 karakter",
                    }
                },
            });
        });
    </script>
</body>

</html>