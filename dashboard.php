<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="asset/vendor/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/vendor/fontawesome/all.min.css">
    <link rel="stylesheet" href="asset/style/style.css"/>
    <title>Penerimaan Peserta Didik Baru</title>
  </head>

  <body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand fw-semibold fs-4" href="index.php"
          >PPDB SMAN 2 Jeruk</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
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
    <section id="handle-table">
      <div class="container">
        <div class="my-5">
          <div class="d-flex justify-content-center w-100">
            <h1>Tabel Pendaftar</h1>
          </div>
          <div class="w-100 d-flex justify-content-between">
            <a href="create.php" type="button" class="btn btn-primary">Tambah Calon Peserta Didik</a>
            <a href="backend/export_pdf.php" type="button" class="btn btn-primary">Unduh Data</a>
          </div>
          <table id="registration_table" class="table table-striped mt-3">
            <thead>
              <tr>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Asal SMP</td>
                <td>Tanggal Lahir</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </section>
    <script src="asset/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="asset/vendor/fontawesome/all.min.js"></script>
    <script src="asset/vendor/jquery/jquery-3.6.3.min.js"></script>
    <script>
        function getActionElement(id){
            let detailElement = $("<a>")
                .attr('href', `detail.php?id=${id}`)
                .addClass('me-1')
                .append(
                  $('<button>')
                  .addClass('btn btn-info btn-sm')
                  .append(
                    $("<i>").addClass("fas fa-info-circle")
                  )
                )
            let deleteElement = $("<a>")
                .attr('href', 'dashboard.php')
                .append(
                  $('<button>')
                  .addClass('btn btn-danger btn-sm')
                  .append(
                    $("<i>").addClass("fas fa-trash-alt")
                  )
                )
                .click(function(){
                    $.ajax({
                      type: "POST",
                      url: "backend/api/registration/delete.php",
                      data: {
                        id: id,
                      },
                      async: true,
                    })
                })
            return [
                detailElement,
                deleteElement 
            ]
        }
      $.ajax({
        type: "GET",
        url: "backend/api/registration/index.php",
        dataType: "json",
        async: false,
        success: function (response) {
          $("#registration_table tbody tr").empty();
          let body = $("#registration_table tbody");
          let hTr;
          // Body
          for (let data of response) {
            body.append(
              $("<tr>")
                .append(
                  $("<td>", {
                    text: data.name,
                  })
                )
                .append(
                  $("<td>", {
                    text: data.gender,
                  })
                )
                .append(
                  $("<td>", {
                    text: data.junior_school,
                  })
                )
                .append(
                  $("<td>", {
                    text: data.birth_date,
                  })
                )
                .append(
                  $("<td>").append(getActionElement(data.id))
                )
            );
          }
        },
      });
    </script>
  </body>
</html>
