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
    <title>Cell2</title>
</head>
<body>
  <nav class="navbar fixed-top mb-3" style="background-color: #7fa1ff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fa-solid fa-mobile pe-2"></i>
        Selamat datang, <span id="nama-pengguna"></span> 
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
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-2">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" onClick="mainpage()">
              <i class="fa-solid fa-house-chimney pe-2"></i>
              Beranda
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" onClick="profile()">
              <i class="fa-solid fa-user pe-2"></i>
              Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" onClick="ubahpassword()">
              <i class="fa-solid fa-lock pe-2"></i>
              Ubah Password
              </a>
            </li>
            <li class="nav-item" id="dashboardNavItem">
              <a class="nav-link active" href="#" onClick="dashboard()">
              <i class="fa-solid fa-chart-line pe-2"></i>
              Dashboard Admin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#" onClick="logout()">
              <i class="fa-solid fa-right-from-bracket pe-2"></i>
              Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
  <!-- <script src="scriptheaderuser1.js"></script> -->
  <script>
    function mainpage() {
        window.location.href = 'mainpage.php';
    }
  </script>
  <script>
    function profile() {
        window.location.href = 'profile.php';
    }
  </script>
  <script>
    function ubahpassword() {
        window.location.href = 'ubahpass.php';
    }
  </script>
  <script>
    function dashboard() {
        window.location.href = 'beranda.php';
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dashboardNavItem = document.getElementById("dashboardNavItem");
            const role = localStorage.getItem("role");

            if (role !== "admin") {
                // Hilangkan menu dashboard admin jika peran pengguna bukan 'admin'
                dashboardNavItem.style.display = "none";
                // Pindahkan logout dekat dengan ubah password
                const logoutNavItem = document.querySelector(".navbar-nav");
                logoutNavItem.insertBefore(dashboardNavItem, logoutNavItem.childNodes[logoutNavItem.childNodes.length - 2]);
            }
        });
    </script>
</body>
</html>