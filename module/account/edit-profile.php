<?php

$id    = $_GET['id'];
$query = mysqli_query($conn, "select * from users where id = $id");
$row   = mysqli_fetch_assoc($query);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (editProfile($_POST) > 0) {
        echo "
            <script>
                alert ('Edit profile berhasil!');
                window.location.href='?page=account&aksi=edit&id=" . $row['id'] . "';
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
                    <i class="pe-7s-user icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Account
                    <div class="page-title-subheading">
                        Account adalah halaman data detail akun.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-4">
            <div class="main-card mb-3 card">
                <div class="card-body text-center">
                    <h5 class="card-title mr-4 mb-4">Profile User</h5>

                    <div class="widget-content-left mr-3">
                        <img src="./assets/images/avatars/1.png" width="50%">
                    </div>

                    <h6 class="mt-3 mr-2"><?= $row['nama'] ?></h5>

                        <a href="?page=account&aksi=edit-profile&id=<?= $row['id'] ?>" class="mt-4 mb-2 mr-2 btn btn-success btn-lg btn-block text-light">Edit Profile</a>

                        <a href="?page=account&aksi=edit-password&id=<?= $row['id'] ?>" class="mb-2 mr-2 btn btn-info btn-lg btn-block text-light">Edit Password</a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mr-4 mb-4">Edit Profile</h5>

                    <form action="" method="post" class="needs-validation">

                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $_POST['nama'] ?? $row['nama'] ?>">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?= $_POST['username'] ?? $row['username'] ?>">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-edit"></i> Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>