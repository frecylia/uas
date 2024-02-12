<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="js/scriptlog1.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
    <!-- <script>
        function onSubmit(token) {
            document.getElementById("formlogin").submit();
        }
    </script> -->
</head>
<body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="center-content col-lg-5">
                    <img src="gambar/6269441-removebg-preview.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1>Selamat Datang</h1>
                    <h4>Login ke akun mu</h4>
                    <form name="form"onsubmit="return validateForm()">
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="email" placeholder="example@gmail.com" class="form-control my-3" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="password" placeholder="Password" class="form-control my-3" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-9">
                                <button type="button" name="submit" class="btn1 mt-3 mb-4" onclick="login()">Login</button>
                            </div>
                        </div>
                        <p>Tidak Punya Akun ? <a  class="span1" href="registerasi.php">Register disini</a></p>
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
    <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let loginAttempts = 0;
        let lastLoginAttempt = 0;

        function login() {
            const currentTime = new Date().getTime();

            if (currentTime - lastLoginAttempt < 5000) {
                //Jika waktu antara kali login yang gagal kurang dari 5 detik, blokir login
                Swal.fire({
                icon: 'error',
                title: 'Login failed',
                text: 'Please wait for 5 seconds before trying again.',
                });
                return;
            }

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const formData = new FormData();
            formData.append('email', email);
            formData.append('pwd', password);

            axios.post('https://cell2-frecylia.000webhostapp.com/conlogin.php', formData)
                .then(response => {
                console.log(response);
                //handle respon dari server
                if (response.data.status == 'success') {
                    //jika login berhasil, buka dashboard
                    const sessionToken = response.data.session_token;
                    var sesi = localStorage.setItem('session_token', sessionToken);
                    const role = response.data.role;
                    var level = localStorage.setItem('role', role);
                    console.log(response.data);
                    window.location.href= 'mainpage.php';
                } else {
                    //Jika login gagal, tampilkan pesan kesalahan 
                    loginAttempts++;
                    if (loginAttempts >= 3) {
                    //Jika login gagal lebih dari 3x, refresh halaman
                    window.location.reload();
                    } else {
                    alert('Login failed. Please check your credentials.');
                    }
                }
                })
                .catch(error => {
                //hadle kesalahan koneksi atau server
                console.error('Error during login:', error);
            });
            lastLoginAttempt = currentTime;
        }
    </script>
</body>
</html>