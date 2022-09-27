<?php

$kodeDB = mysqli_query($conn, "select max(kode_supplier) as maxKode from supplier");
$dataKode = mysqli_fetch_assoc($kodeDB);

if ($dataKode != null) {
    $nilaiKode = substr($dataKode['maxKode'], 2);
    $kode      = (int) $nilaiKode;
    $kode      = $kode + 1;
    $resultKode    = "SP" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $resultKode    = "SP001";
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (tambahSupplier($_POST) > 0) {
        echo "
            <script>
                alert ('Tambah supplier berhasil!');
                window.location.href='?page=supplier';
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
                <div>Tambah Supplier
                    <div class="page-title-subheading">
                        Tambah Supplier adalah halaman untuk menginputkan data Supplier.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tambah Supplier</h5>
                    <form action="" method="post" class="needs-validation">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="kode_supplier">Kode Supplier</label>
                                <input type="text" name="kode_supplier" class="form-control" id="kode_supplier" value="<?= $resultKode; ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama Supplier</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $_POST['nama'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="tgl_daftar">Tanggal Daftar</label>
                                <input type="date" name="tgl_daftar" class="form-control" id="tgl_daftar" value="<?= $_POST['tgl_daftar'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="no_hp">No.Handphone</label>
                                <input type="number" name="no_hp" class="form-control" id="no_hp" value="<?= $_POST['no_hp'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Supplier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>