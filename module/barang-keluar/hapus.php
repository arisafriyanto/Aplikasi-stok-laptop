<?php

if (hapusStokBrgKeluar($_GET) > 0) {
    echo "
        <script>
            window.location.href='?page=brg_keluar';
        </script>
        ";
}
