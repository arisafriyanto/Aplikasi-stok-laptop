<?php

$kode_supplier = $_GET['kode_supplier'];
$query    = mysqli_query($conn, "select * from supplier where kode_supplier = '$kode_supplier'");
$result   = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) == 0) {
    header("location: ?page=supplier");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (editSupplier($_POST) > 0) {
        echo "
            <script>
                alert ('Edit supplier berhasil!');
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
                    <i class="pe-7s-note icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Edit Supplier
                    <div class="page-title-subheading">
                        Edit Supplier adalah halaman untuk mengedit data Supplier.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Edit Supplier</h5>
                    <form action="" method="post" class="needs-validation">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="kode_supplier">Kode Supplier</label>
                                <input type="text" name="kode_supplier" class="form-control" id="kode_supplier" value="<?= $result['kode_supplier'] ?? '' ?>" readonly>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama Supplier</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $_POST['nama'] ?? $result['nama'] ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="tgl_daftar">Tanggal Daftar</label>
                                <input type="date" name="tgl_daftar" class="form-control" id="tgl_daftar" value="<?= $_POST['tgl_daftar'] ?? $result['tgl_daftar'] ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="no_hp">No.Handphone</label>
                                <input type="number" name="no_hp" class="form-control" id="no_hp" value="<?= $_POST['no_hp'] ?? $result['no_hp'] ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control"><?= $_POST['alamat'] ?? $result['alamat'] ?></textarea>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Supplier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>