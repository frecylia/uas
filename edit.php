<?php
    include('headeradmin.php');
    include('check_session.php');
    $idproduk = isset($_POST['idproduk']) ? $_POST['idproduk'] : null;
?>
<div class="container">
    <div class="custom-table-container">
        <h2>Form Edit Produk</h2>
        <form id="addProduk">
        <table class="table table-bordered table-striped table-colored">
            <tbody>
            <input type="hidden" value="<?php echo $idproduk ?>" id="idproduk">  
            <tr>
                <td><label for="namaproduk">Nama Produk:</label></td>
                <td><input type="text" class="form-control" id="namaproduk" name="namaproduk" required></td>
            </tr>
            <tr>
                <td><label for="deskripsi">Deskripsi Produk:</label></td>
                <td><textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea></td>
            </tr>
            <tr>
                <td><label for="harga">Harga Produk:</label></td>
                <td><input type="number" class="form-control" id="harga" name="harga" required></td>
            </tr>
            <tr>
                <td><label for="stock">Stock Produk:</label></td>
                <td><input type="text" class="form-control" id="stock" name="stock" required></td>
            </tr>
            <tr>
                <td><label for="gambar">Gambar Produk:</label></td>
                <td><input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="button" class="btn btn-primary" onclick="editProduk()">Edit Produk</button></td>
            </tr>
            </tbody>
        </table>
        </form>
    </div>
</div>
<script>
    function getData() {
        const idproduk = document.getElementById('idproduk').value;
        var formData = new FormData();
        formData.append('idproduk', idproduk);
        axios.post('https://cell2-frecylia.000webhostapp.com/dataproduk.php', formData)
            .then(function (response) {
                document.getElementById('namaproduk').value = response.data.namaproduk;
                document.getElementById('deskripsi').value = response.data.deskripsi;
                document.getElementById('harga').value = response.data.harga;
                document.getElementById('stock').value = response.data.stock;
            })
            .catch(function (error) {
                console.error(error);
                alert('Error Fetching News Data');
            });
    }
    function editProduk() {
        const idproduk = document.getElementById('idproduk').value;
        const namaproduk = document.getElementById('namaproduk').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const harga = document.getElementById('harga').value;
        const stock = document.getElementById('stock').value;
        const urlImageInput = document.getElementById('gambar');
        const gambar = urlImageInput.files[0];

        var formData = new FormData();
        formData.append('idproduk', idproduk);
        formData.append('namaproduk', namaproduk);
        formData.append('deskripsi', deskripsi);
        formData.append('harga', harga);
        formData.append('stock', stock);

        if (urlImageInput.files.length > 0) {
            formData.append('gambar', gambar);
        } else {
            formData.append('gambar', null);
        }

        axios.post('https://cell2-frecylia.000webhostapp.com/editproduk.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then(function (response) {
            console.log(response.data);
            alert(response.data);
            window.location.href = 'beranda.php';
        })
        .catch(function (error) {
            console.error(error);
            alert('Error Editing News');
        });
    }
    window.onload = getData;
</script>