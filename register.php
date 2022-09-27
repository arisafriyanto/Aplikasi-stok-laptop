<?php

require_once __DIR__ . "/template/header.php";


if (isset($_SESSION['login'])) {
    header("location: ./index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (register($_POST) > 0) {
        echo "
            <script>
                alert ('Register berhasil, silahkan login!');
                window.location.href='./login.php';
            </script>
             ";
    }
}

?>


<div class="app-container app-theme-white body-tabs-shadow closed-sidebar-mobile closed-sidebar">
    <div class="app-container closed-sidebar-mobile closed-sidebar">
        <div class="h-100 bg-deep-blue bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">

                    <h6 class="text-center text-white mb-3">
                        <img src="./assets/images/logo/light.png" width="155px">
                    </h6>

                    <div class="modal-dialog w-100 mx-auto mt-2">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="h5 modal-title text-center">
                                    <h5 class="mt-1 mb-5">
                                        <div class="text-secondary">
                                            Silahkan buat akun dan login.
                                        </div>
                                    </h5>
                                </div>
                                <form action="" method="post" class="">
                                    <div class="form-row">

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input type="text" name="nama" id="nama" placeholder="Nama..." class="form-control" value="<?= $_POST['nama'] ?? '' ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input type="text" name="username" id="username" placeholder="Username..." class="form-control" value="<?= $_POST['username'] ?? '' ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="password" id="password" placeholder="Password..." type="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="confirm_password" id="confirm_password" placeholder="Konfirmasi password..." type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <h6 class="mb-0">
                                        sudah punya akun? <a href="./login.php" class="text-primary">Login</a>
                                    </h6>
                            </div>
                            <div class="modal-footer clearfix">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-info btn-lg">Buat Akun</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3">
                        Copyright &copy; 2021 Aris Afriyanto - Theme : By DashboardPack
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>

</html>