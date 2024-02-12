<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6d10040210.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Cell2: Tempat smarthphone murah dan terpercaya</title>
    <link rel="stylesheet" href="css/styleindex1.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#">Cell2</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Cell2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#service">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="login.php" class="login-button">Login</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section id="hero">
        <div class="container">
            <div class="info">
                <h1>Selamat Datang di Cell2</h1>
                <p>Website penjual smarthphone murah,berkualitas dan terpercaya</p>
                <a href="login.php" class="lesgow-button">Lets GO</a>
            </div>
        </div>
    </section>

    <div class="heading" id="about">
        <h1>About Us</h1>
        <p>Cell2 kami menyediakan rangkaian lengkap perangkat terkini, dari yang terjangkau hingga premium, memenuhi kebutuhan teknologi dan gaya hidup pelanggan kami dengan layanan yang handal dan pengetahuan staf yang ahli.</p>        
    </div>
    <div class="container container-about">
        <section class="about">
            <div class="about-image">
                <img src="gambar/rodion-kutsaiev-0VGG7cqTwCo-unsplash.jpg">
            </div>
            <div class="about-content">
                <p>Kami berkomitmen untuk memberikan pengalaman belanja yang memuaskan, di mana pelanggan dapat menjelajahi dan memilih perangkat yang sesuai dengan kebutuhan dan preferensi mereka. Dengan produk berkualitas dan pelayanan pelanggan yang responsif, kami bertujuan untuk menjadi mitra terpercaya dalam memenuhi kebutuhan teknologi sehari-hari pelanggan kami.</p>
            </div>
        </section>
    </div>

    <div class="container-fluid container-service" id="service">
        <div class="service-wrapper">
            <div class="service">
                <h1>Our Service</h1>
                <div class="cards">
                    <div class="card card-service">
                        <i class="fa-solid fa-user-tie"></i>
                        <h2>Konsultasi Ahli</h2>
                        <p>Memberikan layanan konsultasi dari staf ahli tentang 
                            pilihan smartphone terbaik berdasarkan kebutuhan dan preferensi pelanggan.
                        </p>
                    </div>
                    <div class="card-service">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        <h2>Barter Gadget</h2>
                        <p>Menawarkan program tukar tambah untuk memungkinkan pelanggan mengganti 
                            smartphone lama mereka dengan model terbaru dengan penawaran yang kompetitif
                        </p>
                    </div>
                    <div class="card-service">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <h2>Garansi</h2>
                        <p>Menyediakan layanan purna jual yang inklusif, seperti garansi produk, untuk 
                            memberikan keamanan dan perlindungan tambahan kepada pelanggan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-contact" id="contact">
        <div class="left-column">
            <div class="contact">
                <h2>Get In Touch</h2>
                <form>
                    <label for="name">Your Name:</label>
                    <input type="text" name="name" required>
                    <label for="email">Your Email:</label>
                    <input type="email" name="email" required>
                    <label for="message">Your Message:</label>
                    <textarea name="message" required></textarea>
                    <button class="btn-send" type="submit">Send</button>
                </form>
            </div>
        </div>
        <div class="right-column">
            <div class="content-contact">
                <h1>Contact Us</h1>
                <p>
                Selamat datang di layanan pelanggan 
                kami! Kami senang dapat membantu Anda. Jika Anda memiliki pertanyaan, masukan, atau memerlukan bantuan lebih lanjut, 
                jangan ragu untuk menghubungi kami.
                </p>
                <h2>Contact Information</h2>
                <p>Email: rikgregor@gmail.com</p>
                <p>No.Whatsapp: 0831-1627-8381</p>
                <p>Alamat: Jln. Bandung No.1933</p>
            </div>            
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
    <script src="bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>