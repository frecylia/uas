<?php 
    include('headeruser.php');
    include('check_session.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
<div class="container">
    <h2 class=" text-center mt-5 mb-4">Form Ubah Password</h2>
    <form>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" disabled>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" disabled>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="gantiPass()">Ubah Password</button>
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
    function getData() {
        document.getElementById('nama').value = localStorage.getItem('nama');
        document.getElementById('email').value = localStorage.getItem('email');
    }
    window.onload = getData;
</script>
<script>
    function gantiPass() {
        const nama = document.getElementById('nama').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password');

        var formData = new FormData();
        formData.append('nama', nama);
        formData.append('email', email);
        formData.append('password', password);

        axios.post('https://cell2-frecylia.000webhostapp.com/ubahpassword.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then(function(response) {
            console.log(response.data);
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Password Berhasil Diganti!'
            });
        })
        .catch(function(error) {
            console.error(error);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Gagal Mengganti Password!. Coba Lagi'
            });
        });
    }
</script>