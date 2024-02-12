<?php 
  include('check_session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/6d10040210.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styleheaderuser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script> -->
    <title>Cell2</title>
</head>
<body>
  <nav class="navbar fixed-top" style="background-color: #7fa1ff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fa-solid fa-mobile pe-2"></i>  
        Dashboard Cell2
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: #7fa1ff;">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" onClick="beranda()">
              <i class="fa-solid fa-house-chimney pe-2"></i>
              Beranda
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                aria-expanded="false" aria-controls="pages">
                <i class="fa-solid fa-database pe-2"></i>
                Kelola Data
              </a>
              <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="nav-item">
                  <a href="#" class="nav-link active" onClick="tambah()">Tambah Produk</a>
                </li>
              </ul> 
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" onClick="admin()">
              <i class="fa-solid fa-user-plus pe-2"></i>
              Tambah Admin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" onClick="kembali()">
              <i class="fa-solid fa-shop pe-2"></i>
              Mainpage
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" onClick="logout()">
              <i class="fa-solid fa-right-from-bracket pe-2"></i>
              Logout
              </a>
            </li>
          <!-- <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </div>
    </div>
  </nav>
  <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
  <!-- <script src="scriptheader1.js"></script> -->
  <script>
    function beranda() {
        window.location.href = 'beranda.php';
    }
  </script>
  <script>
    function tambah() {
        window.location.href = 'tambah.php';
    }
  </script>
  <script>
    function admin() {
        window.location.href = 'tambahadmin.php';
    }
  </script>
  <script>
    function kembali() {
        window.location.href = 'mainpage.php';
    }
  </script>
  <script>
    function logout() {
        const sessionToken = localStorage.getItem('session_token');

        localStorage.removeItem('nama');

        const formData = new FormData();
        formData.append('session_token', sessionToken);

        axios.post('https://cell2-frecylia.000webhostapp.com/conlogout.php', formData)
        .then(response => {
            if (response.data.status == 'success') {
            localStorage.removeItem('id');
            localStorage.removeItem('nama');
            localStorage.removeItem('nomorhp');
            localStorage.removeItem('email');
            localStorage.removeItem('role');
            localStorage.removeItem('session_token');
            window.location.href = 'login.php';
            } else {
            alert('Logout Failed. Please Try Again. ');
            }
        })
        .catch(error => {
            console.error('Error during logout:', error);
        });
    }
  </script>
</body>
</html>