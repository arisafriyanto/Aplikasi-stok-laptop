<?php

$kodeDB = mysqli_query($conn, "select max(kode_brg_masuk) as maxKode from barang_masuk");
$dataKode = mysqli_fetch_assoc($kodeDB);

if ($dataKode != null) {
    $nilaiKode = substr($dataKode['maxKode'], 2);
    $kode      = (int) $nilaiKode;
    $kode      = $kode + 1;
    $resultKode    = "BM" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $resultKode    = "BM001";
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (tambahStokBrgMasuk($_POST) > 0) {
        echo "
            <script>
                alert ('Tambah barang masuk berhasil!');
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
                    <i class="pe-7s-plus icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Tambah Barang Masuk
                    <div class="page-title-subheading">
                        Tambah Barang Masuk adalah halaman untuk menginputkan data barang masuk.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tambah Barang Masuk</h5>
                    <form action="" method="post" class="needs-validation">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="kode_brg_masuk">Kode Barang Masuk</label>
                                <input type="text" name="kode_brg_masuk" class="form-control" id="kode_brg_masuk" value="<?= $resultKode; ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="kode_brg">Kode Barang</label>
                                <input type="text" name="kode_brg" class="form-control" id="kode_brg" value="<?= $_POST['kode_brg'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="kode_supplier">Kode Supplier</label>
                                <input type="text" name="kode_supplier" class="form-control" id="kode_supplier" value="<?= $_POST['kode_supplier'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="tanggal">Tanggal Masuk</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $_POST['tanggal'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="stok_masuk">Stok Masuk</label>
                                <input type="number" name="stok_masuk" class="form-control" id="stok_masuk" value="<?= $_POST['stok_masuk'] ?? '' ?>">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>