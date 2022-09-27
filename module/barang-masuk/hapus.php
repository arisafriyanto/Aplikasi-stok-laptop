<?php

if (hapusStokBrgMasuk($_GET) > 0) {
    echo "
        <script>
            window.location.href='?page=brg_masuk';
        </script>
        ";
}
