<?php


if (hapusStokBrg($_GET) > 0) {
    echo "
        <script>
            window.location.href='?page=stok_brg';
        </script>
        ";
}
