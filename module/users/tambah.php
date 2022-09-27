<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (tambahUser($_POST) > 0) {
        echo "
            <script>
                alert ('Tambah user berhasil!');
                window.location.href='?page=users';
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
                    <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Tambah User
                    <div class="page-title-subheading">
                        Tambah User adalah halaman untuk menginputkan data user.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tambah User</h5>
                    <form action="" method="post" class="needs-validation">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $_POST['nama'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?= $_POST['username'] ?? '' ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="confirm_password">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>