<?php
    include('headeradmin.php');
    include('check_session.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
<body>
  <div class="container">
    <h2>Form Tambah Admin</h2>
    <div class="custom-table-container">
      <form>
        <table class="table table-bordered table-striped table-colored">
          <tbody>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" required></td>
            </tr>
            <tr>
                <td><label for="nomorhp">Nomor Handphone:</label></td>
                <td><input type="number" class="form-control" name="nomorhp" id="nomorhp" placeholder="Masukkan nomor handphone" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="button" class="btn btn-primary" onclick="admin()">Tambah Admin</button></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <div class="container-fluid" style="background-color: #7fa1ff;">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
          <div class="col-md-4 d-flex align-items-center">
              <a href="/" class="me-2 text-body-secondary text-decoration-none lh-1">
                  <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
              </a>
              <span class="text-body-secondary">©Copyright. by 21552011099_Kelompok2_TIF221PA_UASWEB1</span>
          </div>
      </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
        function admin() {
             const nama = document.getElementById('nama').value;
             const nomorhp = document.getElementById('nomorhp').value;
             const email = document.getElementById('email').value;
             const password = document.getElementById('password').value;

             if (password.length < 8) {
                 Swal.fire({
                 icon: 'error',
                 title: 'Invalid password',
                 text: 'Password must be at least 8 characters long.',
                 });
                 return;
             }

             const formData = new FormData();
             formData.append('nama', nama);
             formData.append('nomorhp', nomorhp);
             formData.append('email', email);
             formData.append('pwd', password);

             axios.post('https://cell2-frecylia.000webhostapp.com/addadmin.php', formData)
                 .then(response => {
                 console.log(response);
                 if (response.data.status == 'success') {
                 console.log(response.data);
                 console.log(formData);
                 Swal.fire({
                 icon: 'success',
                 title: 'Registration successful',
                 text: 'Please login to continue.',
                 }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "beranda.php";
                    }
                 });
                 } else {
                 Swal.fire({
                 icon: 'error',
                 title: 'Registration failed',
                 text: 'Please check your input.',
                 });
                 }
                 })
                 .catch(error => {
                 console.error('Error during registration:', error);
                 });
             }
    </script>
</body>