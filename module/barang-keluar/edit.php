<?php

$kode_brg_keluar = $_GET['kode_brg_keluar'];
$query    = mysqli_query($conn, "select * from barang_keluar where kode_brg_keluar = '$kode_brg_keluar'");
$result   = mysqli_fetch_assoc($query);

$kode_brg = $result['kode_brg'];

$queryKode    = mysqli_query($conn, "select * from stok_barang where kode_brg = '$kode_brg'");
$resultKode   = mysqli_fetch_assoc($queryKode);


if (mysqli_num_rows($query) == 0) {
    header("location: ?page=brg_keluar");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (editBrgKeluar($_POST) > 0) {
        echo "
            <script>
                alert ('Edit barang keluar berhasil!');
                window.location.href='?page=brg_keluar';
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
                <div>Edit Barang Keluar
                    <div class="page-title-subheading">
                        Edit Barang Keluar adalah halaman untuk mengedit data barang keluar.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Edit Barang Keluar</h5>
                    <form action="" method="post" class="needs-validation">
                        <input type="hidden" name="kode_brg" id="kode_brg" value="<?= $resultKode['kode_brg'] ?? '' ?>">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="kode_brg_keluar">Kode Barang Keluar</label>
                                <input type="text" name="kode_brg_keluar" class="form-control" id="kode_brg_keluar" value="<?= $result['kode_brg_keluar'] ?? '' ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" value="<?= $resultKode['nama_brg'] ?? '' ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="tanggal">Tanggal Keluar</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $result['tanggal'] ?? $_POST['tanggal'] ?>">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="stok_keluar">Stok Keluar</label>
                                <input type="number" name="stok_keluar" class="form-control" id="stok_keluar" value="<?= $result['stok_keluar'] ?? $_POST['stok_keluar'] ?>">
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