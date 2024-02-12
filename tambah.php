<?php
    include('headeradmin.php');
    include('check_session.php');
?>

<body>
  <div class="container">
    <h2>Form Tambah Produk</h2>
    <div class="custom-table-container">
      <form id="addProdukForm">
        <table class="table table-bordered table-striped table-colored">
          <tbody>
            <tr>
                <td><label for="namaproduk">Nama Produk:</label></td>
                <td><input type="text" class="form-control" name="namaproduk" id="namaproduk" placeholder="Masukkan nama produk" required></td>
            </tr>
            <tr>
                <td><label for="deskripsi">Deskripsi Produk:</label></td>
                <td><textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Masukkan deskripsi produk" required></textarea></td>
            </tr>
            <tr>
                <td><label for="harga">Harga Produk:</label></td>
                <td><input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga produk" required></td>
            </tr>
            <tr>
                <td><label for="stock">Stock Produk:</label></td>
                <td><input type="number" class="form-control" name="stock" id="stock" placeholder="Masukkan jumlah stock produk" required></td>
            </tr>
            <tr>
                <td><label for="url_image">Gambar Produk:</label></td>
                <td><input type="file" class="form-control-file" name="url_image" id="url_image" accept="image/*" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="button" class="btn btn-primary" onclick="addProduk()">Tambah Produk</button></td>
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
        function addProduk() {
            const namaproduk = document.getElementById('namaproduk').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const harga = document.getElementById('harga').value;
            const stock = document.getElementById('stock').value;
            const urlImageInput = document.getElementById('url_image');
            const url_image =urlImageInput.files[0];
            
            var formData = new FormData();
            formData.append('namaproduk', namaproduk);
            formData.append('deskripsi', deskripsi);
            formData.append('harga', harga);
            formData.append('stock', stock);
            formData.append('url_image', url_image);

            axios.post('https://cell2-frecylia.000webhostapp.com/addproduk.php', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then(function(response) {
                console.log(response.data);
                console.log(formData);
                alert(response.data);
                document.getElementById('addProdukForm').reset();
            })
            .catch(function(error) {
                console.error(error);
                alert('Error adding news.');
            });
        }
    </script>
</body>