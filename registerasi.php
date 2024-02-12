<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <script src="https://kit.fontawesome.com/6d10040210.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style21.css">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
</head>
<body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="center-content col-lg-5">
                    <img src="gambar/regis-removebg-preview.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1>Selamat Datang</h1>
                    <h4>Daftar Akun mu Disini</h4>
                    <form onsubmit="return validateForm()">
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="text" placeholder="Nama" class="form-control my-3" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="number" placeholder="08XXXXXX" class="form-control my-3" id="nomorhp" name="nomorhp">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="email" placeholder="example@gmail.com" class="form-control my-3" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <div class="password-input-container">
                                    <input type="password" placeholder="Password" class="form-control my-3" id="password" name="password">
                                    <span class="toggle-password" onclick="togglePassword()">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-9">
                                <button type="button" name="submit" class="btn1 mt-3 mb-4" onclick="registerasi()">Register</button>
                            </div>
                        </div>
                        <p>Sudah Punya Akun ? <a class="span1" href="login.php">Login disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
    
    <script src="scriptregis1.js"></script>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.className = "fa-solid fa-eye";
            } else {
                passwordInput.type = "password";
                toggleIcon.className = "fa-solid fa-eye-slash";
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to toggle password visibility
            document.querySelector(".toggle-password").addEventListener('click', togglePassword);
        });
    </script>
    <script>
        function registerasi() {
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

             axios.post('https://cell2-frecylia.000webhostapp.com/register.php', formData)
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
                        window.location.href = "login.php";
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
</html>