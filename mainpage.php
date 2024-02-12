<?php 
    include('headeruser.php');
    include('check_session.php');
?>

<div class="container mt-6">
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <form class="d-flex justify-content-end mb-3">
                <input type="text" name="search" placeholder="Cari produk..." class="form-control form-control-sm me-2" style="width: 150px;">
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
            </form>
        </div>
    </div>
    <div class="row" id="produkContainer">
        <!-- Data Produk akan ditampilkan di sini -->
    </div>
</div>

<footer class="container-fluid mt-2" style="background-color: #7fa1ff;">
    <div class="footer-content py-3 border-top d-flex flex-wrap justify-content-between align-items-center">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">© Copyright. by 21552011099_Kelompok2_TIF221PA_UASWEB1</span>
        </div>
    </div>
</footer>

<!-- Modal Deskripsi -->
<div class="modal fade" id="deskripsiModal" tabindex="-1" aria-labelledby="deskripsiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deskripsiModalLabel">Deskripsi Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deskripsiProduk">
                <!-- Isi deskripsi produk akan dimasukkan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Beli -->
<div class="modal fade" id="beliModal" tabindex="-1" aria-labelledby="beliModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="beliModalLabel">Beli Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <input type="hidden" id="namaproduk" name="namaproduk">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" placeholder="Masukkan jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga">
                    </div>
                    <div class="mb-3">
                        <label for="jenisPembayaran" class="form-label">Jenis Pembayaran</label>
                        <select class="form-select" id="jenisPembayaran">
                            <option value="tunai">Tunai</option>
                            <option value="transfer">Transfer</option>
                            <option value="kredit">Kredit</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="beliProduk()">Beli</button>
            </div>
        </div>
    </div>
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
    // Fungsi untuk mengambil dan menampilkan data produk
    function fetchData() {
        axios.get('https://cell2-frecylia.000webhostapp.com/readproduk.php')
            .then(function (response) {
                var produkData = response.data;

                var produkContainer = document.getElementById('produkContainer');
                produkContainer.innerHTML = ''; // Bersihkan kontainer produk sebelum menambahkan data baru

                produkData.forEach(function (produk) {
                    var produkCardHtml = `
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="${produk.gambar}" class="card-img-top" alt="Gambar Produk">
                                <div class="card-body">
                                    <h5 class="card-title">${produk.namaproduk}</h5>
                                    <p class="card-text">Harga: ${produk.harga}</p>
                                    <p class="card-text">Jumlah: ${produk.stock}</p>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deskripsiModal" onclick="tampilkanDeskripsi('${produk.deskripsi}')">
                                        Lihat Deskripsi
                                    </button>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#beliModal" onclick="isiForm('${produk.namaproduk}', '${produk.harga}')">Beli</button>
                                    <a href="#" class="btn btn-primary position-absolute top-0 end-0 m-2">
                                        <i class="fa-solid fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>`;

                    produkContainer.innerHTML += produkCardHtml;
                });
            })
            .catch(function (error) {
                console.error(error);
                alert('Error fetching product data');
            });
    }
    // Panggil fetchData() ketika halaman dimuat
    fetchData();

    // Fungsi untuk menampilkan deskripsi produk
    function tampilkanDeskripsi(deskripsi) {
        document.getElementById('deskripsiProduk').innerHTML = deskripsi;
    }

    // Fungsi untuk mengisi form beli dengan harga produk
    function isiForm(namaproduk, harga) {
        document.getElementById('namaproduk').value = namaproduk;
        document.getElementById('harga').value = harga;
    }

    // Fungsi untuk menangani pembelian produk
    function beliProduk() {
        // Mendapatkan data dari formulir
        var nama = localStorage.getItem('nama');
        var namaproduk = document.getElementById('namaproduk').value;
        var harga = document.getElementById('harga').value;
        var jumlah = document.getElementById('jumlah').value;

        // Membuat objek data yang akan dikirimkan
        var data = new FormData();
        data.append('nama', nama);
        data.append('namaproduk', namaproduk);
        data.append('harga', harga);
        data.append('jumlah', jumlah);

        // Mengirim permintaan POST ke server menggunakan Axios
        axios.post('https://cell2-frecylia.000webhostapp.com/addbeli.php', data)
            .then(function(response) {
                // Menampilkan pesan dari server
                alert(response.data);
                // Menutup modal setelah pembelian berhasil
                $('#beliModal').modal('hide');
            })
            .catch(function(error) {
                console.error(error);
                alert('Error melakukan pembelian');
            });
    }
</script>
