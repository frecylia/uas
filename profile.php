<?php 
  include('headeruser.php');
  include('check_session.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
<div class="container">
<h2 class="text-center mt-5">Halo, <span id="welcomeMessage"></span></h2>
<form>
    <div class="mb-3">
    <input type="hidden" id="id" name="id">
    <label for="nama" class="form-label">Nama:</label>
    <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
    <label for="nomor_hp" class="form-label">Nomor HP:</label>
    <input type="tel" class="form-control" id="nomorhp" name="nomorhp" pattern="[0-9]{10,12}">
    <small class="form-text text-muted">Format: 10-12 digit angka</small>
    </div>
    <div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" name="email">
    </div>
    <button type="button" name="submit" onclick="editProfile()" class="btn btn-primary">Edit Profile</button>
</form>
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
    // Mengambil nama dari local storage
    const storedNama = localStorage.getItem('nama');
    // Memeriksa apakah nama tersedia di local storage
    if (storedNama) {
        // Menampilkan nama pengguna di dalam elemen dengan id "nama-pengguna"
        document.getElementById('nama-pengguna').textContent = storedNama;
    } else {
        // Jika nama tidak tersedia, tampilkan pesan default
        document.getElementById('nama-pengguna').textContent = 'Tidak ada nama pengguna yang tersimpan';
    }
</script>
<script>
    // Mengambil nama dari local storage
    const welcome = localStorage.getItem('nama');
    // Memeriksa apakah nama tersedia di local storage
    if (storedNama) {
        // Menampilkan nama pengguna di dalam elemen dengan id "nama-pengguna"
        document.getElementById('welcomeMessage').textContent = welcome;
    } else {
        // Jika nama tidak tersedia, tampilkan pesan default
        document.getElementById('welcomeMessage').textContent = 'Tidak ada nama pengguna yang tersimpan';
    }
</script>
<script>
    function getData() {
        document.getElementById('id').value = localStorage.getItem('id')
        document.getElementById('nama').value = localStorage.getItem('nama');
        document.getElementById('nomorhp').value = localStorage.getItem('nomorhp');
        document.getElementById('email').value = localStorage.getItem('email');
    }
    window.onload = getData;
</script>
<script>
    function editProfile() {
        const id = document.getElementById('id').value;
        const nama = document.getElementById('nama').value;
        const nomorhp = document.getElementById('nomorhp').value;
        const email = document.getElementById('email').value;

        var formData = new FormData();
        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('nomorhp', nomorhp);
        formData.append('email', email);

        axios.post('https://cell2-frecylia.000webhostapp.com/editprofile.php', formData, {
        })
        .then(function(response) {
            console.log(response.data);
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Profil Berhasil Diganti!'
            });
            window.location.reload();
        })
        .catch(function(error) {
            console.error(error);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Gagal Mengedit Profil!. Coba Lagi'
            });
        });
    }
</script>