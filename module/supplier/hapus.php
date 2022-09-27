<?php

if (hapusSupplier($_GET) > 0) {
    echo "
        <script>
            window.location.href='?page=supplier';
        </script>
        ";
}
