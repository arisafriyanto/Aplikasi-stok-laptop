<?php

$kode_brg = $_GET['kode_brg'];
$query    = mysqli_query($conn, "select * from stok_barang where kode_brg = '$kode_brg'");
$result   = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) == 0) {
    header("location: ?page=stok_brg");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (editStokBrg($_POST) > 0) {
        echo "
            <script>
                alert ('Edit barang berhasil!');
                window.location.href='?page=stok_brg';
            </script>
             ";
    }
}

?>



<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Edit Stok Barang
                    <div class="page-title-subheading">
                        Edit Stok Barang adalah halaman untuk mengedit data stok barang.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Edit Stok Barang</h5>
                    <form action="" method="post" class="needs-validation">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="kode_brg">Kode Barang</label>
                                <input type="text" name="kode_brg" class="form-control" id="kode_brg" value="<?= $result['kode_brg'] ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" value="<?= $_POST['nama_brg'] ?? $result['nama_brg'] ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="warna">Warna</label>
                                <input type="text" name="warna" class="form-control" id="warna" value="<?= $_POST['warna'] ?? $result['warna'] ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="Rp. <?= number_format($result['harga'], 0, ",", ".") ?>">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="stok_akhir">Stok Akhir</label>
                                <input type="number" name="stok_akhir" class="form-control" id="stok_akhir" value="<?= $result['stok_akhir'] ??  0 ?>">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>