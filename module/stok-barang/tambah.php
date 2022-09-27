<?php

$kodeDB = mysqli_query($conn, "select max(kode_brg) as maxKode from stok_barang");
$dataKode = mysqli_fetch_assoc($kodeDB);

if ($dataKode != null) {
    $nilaiKode = substr($dataKode['maxKode'], 3);
    $kode      = (int) $nilaiKode;
    $kode      = $kode + 1;
    $resultKode    = "BRG" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $resultKode    = "BRG001";
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (tambahStokBrg($_POST) > 0) {
        echo "
            <script>
                alert ('Tambah barang berhasil!');
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
                    <i class="pe-7s-plus icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Tambah Stok Barang
                    <div class="page-title-subheading">
                        Tambah Stok Barang adalah halaman untuk menginputkan data stok barang.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tambah Stok Barang</h5>
                    <form action="" method="post" class="needs-validation">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="kode_brg">Kode Barang</label>
                                <input type="text" name="kode_brg" class="form-control" id="kode_brg" value="<?= $resultKode; ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" value="<?= $_POST['nama_brg'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="warna">Warna</label>
                                <input type="text" name="warna" class="form-control" id="warna" value="<?= $_POST['warna'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="<?= $_POST['harga'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="stok_akhir">Stok Akhir</label>
                                <input type="number" name="stok_akhir" class="form-control" id="stok_akhir" value="<?= $_POST['stok_akhir'] ?? 0 ?>">
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