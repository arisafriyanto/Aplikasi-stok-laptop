<?php

$kode_brg_masuk = $_GET['kode_brg_masuk'];
$query    = mysqli_query($conn, "select * from barang_masuk where kode_brg_masuk = '$kode_brg_masuk'");
$result   = mysqli_fetch_assoc($query);

$kode_brg = $result['kode_brg'];
$kode_spl = $result['kode_supplier'];

$queryKode    = mysqli_query($conn, "select * from stok_barang where kode_brg = '$kode_brg'");
$resultKode   = mysqli_fetch_assoc($queryKode);

$querySpl    = mysqli_query($conn, "select * from supplier where kode_supplier = '$kode_spl'");
$resultSpl   = mysqli_fetch_assoc($querySpl);

if (mysqli_num_rows($query) == 0) {
    header("location: ?page=brg_masuk");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (editBrgMasuk($_POST) > 0) {
        echo "
            <script>
                alert ('Edit barang berhasil!');
                window.location.href='?page=brg_masuk';
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
                <div>Edit Barang Masuk
                    <div class="page-title-subheading">
                        Edit Barang Masuk adalah halaman untuk mengedit data barang masuk.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Edit Barang Masuk</h5>
                    <form action="" method="post" class="needs-validation">
                        <input type="hidden" name="kode_brg" id="kode_brg" value="<?= $resultKode['kode_brg'] ?? '' ?>">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="kode_brg_masuk">Kode Barang Masuk</label>
                                <input type="text" name="kode_brg_masuk" class="form-control" id="kode_brg_masuk" value="<?= $result['kode_brg_masuk'] ?? '' ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" value="<?= $resultKode['nama_brg'] ?? '' ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama_supplier">Supplier</label>
                                <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" value="<?= $resultSpl['nama'] ?? '' ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="tanggal">Tanggal Masuk</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $_POST['tanggal'] ?? $result['tanggal'] ?>">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="stok_masuk">Stok Masuk</label>
                                <input type="number" name="stok_masuk" class="form-control" id="stok_masuk" value="<?= $_POST['stok_masuk'] ?? $result['stok_masuk'] ?>">
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