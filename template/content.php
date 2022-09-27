<?php

@$page = $_GET['page'];
@$aksi = $_GET['aksi'];

switch ($page) {
    case "":
        include __DIR__ . "/../module/home/index.php";
        break;
    case "brg_masuk":
        if ($aksi == "") {
            include __DIR__ . "/../module/barang-masuk/index.php";
            break;
        } else if ($aksi == "tambah") {
            include __DIR__ . "/../module/barang-masuk/tambah.php";
            break;
        } else if ($aksi == "edit") {
            include __DIR__ . "/../module/barang-masuk/edit.php";
            break;
        } else if ($aksi == "hapus") {
            include __DIR__ . "/../module/barang-masuk/hapus.php";
            break;
        }
    case 'stok_brg':
        if ($aksi == "") {
            include __DIR__ . "/../module/stok-barang/index.php";
            break;
        } else if ($aksi == "tambah") {
            include __DIR__ . "/../module/stok-barang/tambah.php";
            break;
        } else if ($aksi == "edit") {
            include __DIR__ . "/../module/stok-barang/edit.php";
            break;
        } else if ($aksi == "hapus") {
            include __DIR__ . "/../module/stok-barang/hapus.php";
            break;
        }
    case 'brg_keluar':
        if ($aksi == "") {
            include __DIR__ . "/../module/barang-keluar/index.php";
            break;
        } else if ($aksi == "tambah") {
            include __DIR__ . "/../module/barang-keluar/tambah.php";
            break;
        } else if ($aksi == "edit") {
            include __DIR__ . "/../module/barang-keluar/edit.php";
            break;
        } else if ($aksi == "hapus") {
            include __DIR__ . "/../module/barang-keluar/hapus.php";
            break;
        }
    case 'users':
        if ($aksi == "") {
            include __DIR__ . "/../module/users/index.php";
            break;
        } else if ($aksi == "tambah") {
            include __DIR__ . "/../module/users/tambah.php";
            break;
        } else if ($aksi == "hapus") {
            include __DIR__ . "/../module/users/hapus.php";
            break;
        }
    case 'supplier':
        if ($aksi == "") {
            include __DIR__ . "/../module/supplier/index.php";
            break;
        } else if ($aksi == "tambah") {
            include __DIR__ . "/../module/supplier/tambah.php";
            break;
        } else if ($aksi == "edit") {
            include __DIR__ . "/../module/supplier/edit.php";
            break;
        } else if ($aksi == "hapus") {
            include __DIR__ . "/../module/supplier/hapus.php";
            break;
        }
    case 'account':
        if ($aksi == "edit") {
            include __DIR__ . "/../module/account/edit.php";
            break;
        } else if ($aksi == "edit-profile") {
            include __DIR__ . "/../module/account/edit-profile.php";
            break;
        } else if ($aksi == "edit-password") {
            include __DIR__ . "/../module/account/edit-password.php";
            break;
        }
}
