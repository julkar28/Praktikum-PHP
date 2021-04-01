<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Praktikum PHP 2</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Student Activity Score - STTNF</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login.html">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link" href="home.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <a class="nav-link" href="form_nilai.php">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Form
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Admin
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Form Nilai</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="form_nilai.php">Form Nilai</a></li>
            <li class="breadcrumb-item active">Hasil Akhir</li>
          </ol>

          <div class="card mb-4">
            <div class="card-header">
              Sistem Penilaian
            </div>
            <div class="card-body">
              <h3>Hasil Nilai Akhir</h3>
              <hr class="my-2">
              <?php
              require_once 'libfungsi.php';

              if (!empty($_POST['proses'])) {
                $proses = $_POST['proses'];
                $nama_siswa = $_POST['nama'];
                $mata_kuliah = $_POST['matkul'];
                $nilai_uts = $_POST['nilai_uts'];
                $nilai_uas = $_POST['nilai_uas'];
                $nilai_tugas = $_POST['nilai_tugas'];
                $totalx = $nilai_uts * 0.3 + $nilai_uas * 0.35 + $nilai_tugas * 0.35;
                $total = round($totalx, 2);
                $grade = grade($total);
                $kelulusan = kelulusan($total);
                $predikat = predikat($grade);
                echo '<table class="table table-bordered">
                                        <thead class="thead-light">
                                          <tr class="text-center">
                                            <th scope="col">Nama</th>
                                            <th scope="col">Mata Kuliah</th>
                                            <th scope="col">Nilai UTS</th>
                                            <th scope="col">Nilai UAS</th>
                                            <th scope="col">Nilai Tugas</th>
                                            <th scope="col">Nilai Akhir</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Proses</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr class="text-center">';
                echo '<td>' . $nama_siswa . '</td>';
                echo '<td>' . $mata_kuliah . '</td>';
                echo '<td>' . $nilai_uts . '</td>';
                echo '<td>' . $nilai_uas . '</td>';
                echo '<td>' . $nilai_tugas . '</td>';
                echo '<td>' . $total . '</td>';
                echo '<td>' . $grade . '</td>';
                echo '<td>' . $proses . '</td>
                                          </tr>
                                        </tbody>
                                      </table>';

                if ($kelulusan == 'LULUS') {
                  echo '<div class="alert alert-success text-center" role="alert">Selamat ' . $nama_siswa . ' Anda dinyatakan LULUS pada mata kuliah ' . $mata_kuliah . ' dengan predikat ' . $predikat . '</div>';
                } else {
                  echo '<div class="alert alert-danger text-center" role="alert">Maaf ' . $nama_siswa . ' Anda TIDAK LULUS pada mata kuliah ' . $mata_kuliah . ' dengan predikat ' . $predikat . '</div>';
                }

                $file_siswa = file_get_contents('data_siswa.json');
                $data = json_decode($file_siswa, true);
                $data['siswa'][] = ["nama" => $nama_siswa, "matkul" => $mata_kuliah, "uts" => $nilai_uts, "uas" => $nilai_uas, "tugas" => $nilai_tugas, "total" => $total, "grade" => $grade, "state" => $kelulusan];
                $json_data = json_encode($data, JSON_PRETTY_PRINT);
                $file_siswa = file_put_contents('data_siswa.json', $json_data);
              }
              ?>
            </div>
          </div>

        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2020</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>