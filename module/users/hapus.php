<?php


if (hapusUser($_GET) > 0) {
    echo "
        <script>
            window.location.href='?page=users';
        </script>
        ";
}
