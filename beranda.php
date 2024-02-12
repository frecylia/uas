<?php
    include('headeradmin.php');
    include('check_session.php');
?>

<div class="container mt-6">
    <div class="col">
        <button id="downloadExcelBtn" class="btn btn-success">
            <i class="fa-solid fa-file-arrow-down"></i>
            Download Data Produk
        </button>
    </div>
    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-4">List Produk</h2>
        </div>

    </div>

    <table id="produkTable" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#produkTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": function (data, callback, settings) {
                axios.get('https://cell2-frecylia.000webhostapp.com/readproduk.php', {
                    params: {
                        key: data.search.value
                    }
                })
                .then(function (response) {
                    response.data.forEach(function (row, index) {
                        row.no = index + 1;
                    });

                    callback({
                        draw: data.draw,
                        recordsTotal: response.data.length,
                        recordsFiltered: response.data.length,
                        data: response.data
                    });
                })
                .catch(function (error) {
                    console.error(error);
                    alert('Error Fetching Produk Data');
                });
            },
            "columns": [{
                    "data": "no"
                },
                {
                    "data": "namaproduk"
                },
                {
                    "data": "deskripsi"
                },
                {
                    "data": "harga"
                },
                {
                    "data": "gambar",
                    "render": function (data, type, row) {
                        return '<img src="' + data + '" alt="image" style="max-width: 100px; max-height: 100px;">';
                    }
                },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<div class="btn-group">' +
                            '<button class="btn btn-danger btn-sm" onclick="deleteProduk(' + row.idproduk + ')">Delete</button>' +
                            '<form action="edit.php" method="post">' +
                            '<input type="hidden" name="idproduk" value="' + row.idproduk + '">' +
                            '<button type="submit" class="btn btn-primary btn-sm">Edit</button>' +
                            '</form>' +
                            '</div>';
                    }
                }
            ]
        });

        // Fungsi untuk mengambil data dari tabel dan menyimpannya ke dalam file Excel
        function exportToExcel() {
            var data = table.rows().data().toArray();
            var exportData = data.map(function(row) {
                return {
                    "No": row.no,
                    "Nama Produk": row.namaproduk,
                    "Deskripsi": row.deskripsi,
                    "Harga": row.harga
                };
            });

            var ws = XLSX.utils.json_to_sheet(exportData);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Produk");
            XLSX.writeFile(wb, 'produk.xlsx');
        }

        // Menambahkan event listener untuk tombol "Download Excel"
        document.getElementById('downloadExcelBtn').addEventListener('click', function() {
            exportToExcel();
        });
    });

    function deleteProduk(idproduk) {
        var formData = new FormData();
        formData.append('idproduk', idproduk);

        if (confirm("Apa Kamu Yakin Ingin Menghapus?")) {
            axios.post('https://cell2-frecylia.000webhostapp.com/deleteproduk.php', formData)
                .then(function(response) {
                    alert(response.data);
                    $('#produkTable').DataTable().ajax.reload();
                })
                .catch(function(error) {
                    console.error(error);
                    alert('Error Deleting Produk');
                });
        }
    }
</script>