<?php

require_once __DIR__ . "/template/header.php";


if (isset($_SESSION['login'])) {
    header("location: ./index.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (login($_POST) > 0) {
        header("location: ./index.php");
        exit();
    }
}


?>


<div class="app-container app-theme-white body-tabs-shadow closed-sidebar-mobile closed-sidebar">
    <div class="app-container closed-sidebar-mobile closed-sidebar">
        <div class="h-100 bg-arielle-smile bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">

                    <h3 class="text-center text-white mb-3">
                        <img src="./assets/images/logo/light.png" width="155px">
                    </h3>

                    <div class="modal-dialog w-100 mx-auto mt-3">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="h5 modal-title text-center">
                                    <h5 class="mt-2 mb-5">
                                        <div class="text-secondary">Selamat Datang</div>
                                        <span>Silahkan login dengan akun Anda.</span>
                                    </h5>
                                </div>
                                <form action="" method="post">

                                    <div class="form-row">

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input type="text" name="username" id="username" placeholder="username..." class="form-control" value="<?= $_POST['username'] ?? '' ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="password...">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="divider"></div>
                                    <h6 class="mb-0">belum punya akun? <a href="./register.php" class="text-primary">Register</a></h6>
                            </div>
                            <div class="modal-footer clearfix">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-info btn-lg">Login to dashboard</button>
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