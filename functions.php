<?php

require_once __DIR__ . "/config/connection.php";


/**
 * ! Select
 */

function query($sql): array
{
    global $conn;

    $query = mysqli_query($conn, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }

    return $rows;
    mysqli_close($conn);
}

/**
 * ! Validation input
 */

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}



/**
 * ! Convert Rupiah to Int
 */

function rupiahToInt(string $nilai): int
{
    $hasil    = preg_replace("/[^0-9]/", "", $nilai);
    $hasilInt = (int) $hasil;
    return $hasilInt;
}



/**
 * !Register
 */

function register(array $data): bool
{
    global $conn;

    $nama               = htmlspecialchars($data['nama']);
    $username           = strtolower(stripslashes($data['username']));
    $password           = mysqli_real_escape_string($conn, $data['password']);
    $confirm_password   = mysqli_real_escape_string($conn, $data['confirm_password']);

    $queryCek           = mysqli_query($conn, "select username from users where username = '$username'");
    $resultCek          = mysqli_fetch_assoc($queryCek);

    if (
        $username == null || $nama == null || $password == null || $confirm_password == null ||
        trim($username) == "" || trim($nama) == "" || trim($password) == "" || trim($confirm_password) == ""
    ) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    } else if ($password !== $confirm_password) {

        echo "
            <script>
                alert ('Konfirmasi password harus sama!');
            </script>
             ";

        return false;
    } else if ($resultCek != null) {

        echo "
            <script>
                alert ('Username sudah digunakan!');
            </script>
             ";

        return false;
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    $sql      = "insert into users (username, password, nama) values ('$username', '$password', '$nama')";
    $query    = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return true;
}


/**
 * !Login
 */

function login(array $data): bool
{
    global $conn;

    $username  = htmlspecialchars(addslashes(strtolower($data['username'])));
    $password  = mysqli_real_escape_string($conn, $data['password']);

    $queryCek  = mysqli_query($conn, "select username from users where username = '$username'");
    $resultCek = mysqli_fetch_assoc($queryCek);

    if ($username == null || $password == null || trim($username) == "" || trim($password) == "") {
        echo "
            <script>
                alert ('Username atau password tidak boleh kosong!');
            </script>
            ";

        return false;
    } else if (!$resultCek) {

        echo "
            <script>
                alert ('Username atau password salah!');
            </script>
            ";

        return false;
    }


    $query = mysqli_query($conn, "select id, username, password, nama from users where username = '$username'");

    if (mysqli_num_rows($query) > 0) {

        $row = mysqli_fetch_assoc($query);

        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['id']    = $row['id'];

            return true;
        } else {

            echo "
                <script>
                    alert ('Username atau password salah!');
                </script>
                ";

            return false;
        }
    }
}




//? Start CRUD Stok Barang




/**
 * !Tambah Stok Barang
 */

function tambahStokBrg(array $data): bool
{
    global $conn;

    $kode_brg     = test_input($data['kode_brg']);
    $nama_brg     = test_input($data['nama_brg']);
    $warna        = test_input($data['warna']);
    $harga        = test_input($data['harga']);
    $stok_akhir   = test_input($data['stok_akhir']);

    $hargaInt = rupiahToInt($harga);

    if ($kode_brg == null || $nama_brg == null || $warna == null || $harga == null || $stok_akhir == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }


    $sql   = "insert into stok_barang (kode_brg, nama_brg, warna, harga, stok_akhir) values
             ('$kode_brg', '$nama_brg', '$warna', $hargaInt, $stok_akhir)";
    $query = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return true;
}



/**
 * !Edit Stok Barang
 */

function editStokBrg(array $data): bool
{
    global $conn;

    $kode_brg     = test_input($data['kode_brg']);
    $nama_brg     = test_input($data['nama_brg']);
    $warna        = test_input($data['warna']);
    $harga        = test_input($data['harga']);
    $stok_akhir   = test_input($data['stok_akhir']);

    $hargaInt = rupiahToInt($harga);

    if ($kode_brg == null || $nama_brg == null || $warna == null || $harga == null || $stok_akhir == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }

    $sql  = "update stok_barang set nama_brg='$nama_brg', warna='$warna', harga='$hargaInt', stok_akhir='$stok_akhir' where kode_brg='$kode_brg'";
    $query = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return true;
}


/**
 * ! Hapus Stok Barang
 */

function hapusStokBrg(array $data): bool
{
    global $conn;

    $kode_brg = $data['kode_brg'];
    $query = mysqli_query($conn, "delete from stok_barang where kode_brg = '$kode_brg'");

    if (mysqli_affected_rows($conn) === -1) {

        echo "
            <script>
                alert ('Data barang masih digunakan tidak bisa dihapus!');
                window.location.href='?page=stok_brg';
            </script>
            ";

        return false;
    }

    mysqli_close($conn);
    return true;
}




//? End CRUD Stok Barang




//? Start CRUD Barang Masuk



/**
 * !Tambah Barang Masuk
 */

function tambahStokBrgMasuk(array $data): bool
{
    global $conn;

    $kode_brg_masuk  = test_input($data['kode_brg_masuk']);
    $kode_brg        = test_input($data['kode_brg']);
    $kode_spl        = test_input($data['kode_supplier']);
    $tanggal         = test_input($data['tanggal']);
    $stok_masuk      = test_input($data['stok_masuk']);

    $pecah_kode_brg = explode(" | ", $kode_brg);
    $hsl_kode_brg = $pecah_kode_brg[0];


    $pecah_kode_spl = explode(" | ", $kode_spl);
    $hsl_kode_spl = $pecah_kode_spl[0];

    if ($kode_brg_masuk == null || $kode_brg == null || $tanggal == null || $stok_masuk == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }


    $sql          = "insert into barang_masuk (kode_brg_masuk, kode_brg, kode_supplier, tanggal, stok_masuk) values
                     ('$kode_brg_masuk', '$hsl_kode_brg', '$hsl_kode_spl', '$tanggal', $stok_masuk)";
    $query        = mysqli_query($conn, $sql);

    $sqlUpdate    = "update stok_barang set stok_akhir = (stok_akhir + $stok_masuk) where kode_brg = '$hsl_kode_brg'";
    $queryUpdate  = mysqli_query($conn, $sqlUpdate);

    mysqli_close($conn);
    return true;
}



/**
 * ! Edit Barang Masuk
 */

function editBrgMasuk(array $data): bool
{
    global $conn;

    $kode_brg_masuk     = test_input($data['kode_brg_masuk']);
    $kode_brg           = test_input($data['kode_brg']);
    $tanggal            = test_input($data['tanggal']);
    $stok_masuk         = test_input($data['stok_masuk']);

    if ($kode_brg_masuk == null || $tanggal == null || $stok_masuk == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }

    $queryBrgMasuk      = mysqli_query($conn, "select * from barang_masuk where kode_brg_masuk='$kode_brg_masuk'");
    $resultBrgMasuk     = mysqli_fetch_assoc($queryBrgMasuk);
    $stokMasukDB        = $resultBrgMasuk['stok_masuk'];


    if ($stok_masuk > $stokMasukDB) {
        $selisihStok = $stok_masuk - $stokMasukDB;

        $sqlStokBrg   = "update stok_barang set stok_akhir=(stok_akhir + $selisihStok) where kode_brg='$kode_brg'";
        $queryStokBrg = mysqli_query($conn, $sqlStokBrg);
    } else {
        $selisihStok = $stokMasukDB - $stok_masuk;

        $sqlStokBrg   = "update stok_barang set stok_akhir=(stok_akhir - $selisihStok) where kode_brg='$kode_brg'";
        $queryStokBrg = mysqli_query($conn, $sqlStokBrg);
    }

    $sqlBrgMasuk = "update barang_masuk set tanggal='$tanggal', stok_masuk=$stok_masuk where kode_brg_masuk='$kode_brg_masuk'";
    $queryBrgMasuk = mysqli_query($conn, $sqlBrgMasuk);


    mysqli_close($conn);
    return true;
}


/**
 * ! Hapus Barang Masuk
 */

function hapusStokBrgMasuk(array $data): bool
{
    global $conn;

    $kode_brg_masuk = $data['kode_brg_masuk'];
    $kode_brg       = $data['kode_brg'];
    $stok_masuk     = $data['stok_masuk'];

    if (test_input($kode_brg_masuk)) {

        $sql         = "delete from barang_masuk where kode_brg_masuk = '$kode_brg_masuk'";
        $query       = mysqli_query($conn, $sql);

        $sqlUpdate   = "update stok_barang set stok_akhir = (stok_akhir - $stok_masuk) where kode_brg = '$kode_brg'";
        $queryUpdate = mysqli_query($conn, $sqlUpdate);

        mysqli_close($conn);
        return true;
    }
}



//? End CRUD Stok Barang



//? Start CRUD Users



/**
 * !Tambah User
 */

function tambahUser(array $data): bool
{
    global $conn;

    $nama               = htmlspecialchars($data['nama']);
    $username           = strtolower(stripslashes($data['username']));
    $password           = mysqli_real_escape_string($conn, $data['password']);
    $confirm_password   = mysqli_real_escape_string($conn, $data['confirm_password']);

    $queryCek           = mysqli_query($conn, "select username from users where username = '$username'");
    $resultCek          = mysqli_fetch_assoc($queryCek);

    if (
        $username == null || $nama == null || $password == null || $confirm_password == null ||
        trim($username) == "" || trim($nama) == "" || trim($password) == "" || trim($confirm_password) == ""
    ) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    } else if ($password !== $confirm_password) {

        echo "
            <script>
                alert ('Konfirmasi password harus sama!');
            </script>
             ";

        return false;
    } else if ($resultCek != null) {

        echo "
            <script>
                alert ('Username sudah digunakan!');
            </script>
             ";

        return false;
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    $sql      = "insert into users (username, password, nama) values ('$username', '$password', '$nama')";
    $query    = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return true;
}


/**
 * ! Hapus User
 */

function hapusUser(array $data): bool
{
    global $conn;

    $id = $data['id'];
    $query = mysqli_query($conn, "delete from users where id = $id");

    mysqli_close($conn);
    return true;
}




//? End CRUD Users



//? Start CRUD Barang Keluar



/**
 * !Tambah Barang Keluar
 */

function tambahStokBrgkeluar(array $data): bool
{
    global $conn;

    $kode_brg_keluar  = test_input($data['kode_brg_keluar']);
    $kode_brg         = test_input($data['kode_brg']);
    $tanggal          = test_input($data['tanggal']);
    $stok_keluar      = test_input($data['stok_keluar']);

    $pecah_kode_brg = explode(" | ", $kode_brg);
    $hsl_kode_brg   = $pecah_kode_brg[0];

    $queryBrg  = mysqli_query($conn, "select * from stok_barang where kode_brg = '$hsl_kode_brg'");
    $resultBrg = mysqli_fetch_assoc($queryBrg);
    $stokAkhir = $resultBrg['stok_akhir'];



    if ($kode_brg_keluar == null || $kode_brg == null || $tanggal == null || $stok_keluar == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    } else if ($stok_keluar > $stokAkhir) {
        echo "
            <script>
                alert ('Jumlah stok keluar melebihi sisa stok barang!');
            </script>
            ";

        return false;
    }


    $sql          = "insert into barang_keluar (kode_brg_keluar, kode_brg, tanggal, stok_keluar) values
                     ('$kode_brg_keluar', '$hsl_kode_brg', '$tanggal', $stok_keluar)";
    $query        = mysqli_query($conn, $sql);

    $sqlUpdate    = "update stok_barang set stok_akhir = (stok_akhir - $stok_keluar) where kode_brg = '$hsl_kode_brg'";
    $queryUpdate  = mysqli_query($conn, $sqlUpdate);

    mysqli_close($conn);
    return true;
}



/**
 * ! Edit Barang Keluar
 */

function editBrgKeluar(array $data): bool
{
    global $conn;

    $kode_brg_keluar     = test_input($data['kode_brg_keluar']);
    $kode_brg            = test_input($data['kode_brg']);
    $tanggal             = test_input($data['tanggal']);
    $stok_keluar         = test_input($data['stok_keluar']);

    if ($kode_brg_keluar == null || $kode_brg == null || $tanggal == null || $stok_keluar == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }

    $queryBrgKeluar      = mysqli_query($conn, "select * from barang_keluar where kode_brg_keluar='$kode_brg_keluar'");
    $resultBrgKeluar     = mysqli_fetch_assoc($queryBrgKeluar);
    $stokKeluarDB        = $resultBrgKeluar['stok_keluar'];

    $queryStokBrg        = mysqli_query($conn, "select * from stok_barang where kode_brg='$kode_brg'");
    $resultStokBrg       = mysqli_fetch_assoc($queryStokBrg);
    $stokAkhirDB         = $resultStokBrg['stok_akhir'];


    if ($stok_keluar > $stokKeluarDB) {
        $selisihStok = $stok_keluar - $stokKeluarDB;

        if ($selisihStok <= $stokAkhirDB) {
            //! stok keluar cukup, lanjutkan

            $sqlStokBrg   = "update stok_barang set stok_akhir=(stok_akhir - $selisihStok) where kode_brg='$kode_brg'";
            $queryStokBrg = mysqli_query($conn, $sqlStokBrg);
        } else {
            //! stok gk cukup, kirim alert

            echo "
                <script>
                    alert ('Jumlah stok keluar melebihi sisa stok barang!');
                </script>
                ";

            return false;
        }
    } else {
        $selisihStok = $stokKeluarDB - $stok_keluar;

        $sqlStokBrg   = "update stok_barang set stok_akhir=(stok_akhir + $selisihStok) where kode_brg='$kode_brg'";
        $queryStokBrg = mysqli_query($conn, $sqlStokBrg);
    }

    $sqlBrgKeluar = "update barang_keluar set tanggal='$tanggal', stok_keluar=$stok_keluar where kode_brg_keluar='$kode_brg_keluar'";
    $queryBrgkeluar = mysqli_query($conn, $sqlBrgKeluar);


    mysqli_close($conn);
    return true;
}


/**
 * ! Hapus Barang Keluar
 */

function hapusStokBrgKeluar(array $data): bool
{
    global $conn;

    $kode_brg_keluar = $data['kode_brg_keluar'];
    $kode_brg        = $data['kode_brg'];
    $stok_keluar     = $data['stok_keluar'];

    if (test_input($kode_brg_keluar)) {

        $sql         = "delete from barang_keluar where kode_brg_keluar = '$kode_brg_keluar'";
        $query       = mysqli_query($conn, $sql);

        $sqlUpdate   = "update stok_barang set stok_akhir = (stok_akhir + $stok_keluar) where kode_brg = '$kode_brg'";
        $queryUpdate = mysqli_query($conn, $sqlUpdate);

        mysqli_close($conn);
        return true;
    }
}


//? End CRUD Barang Keluar





//? Start CRUD Supplier




/**
 * !Tambah Supplier
 */

function tambahSupplier(array $data): bool
{
    global $conn;

    $kode_supplier  = test_input($data['kode_supplier']);
    $nama           = test_input($data['nama']);
    $tgl_daftar     = test_input($data['tgl_daftar']);
    $no_hp          = test_input($data['no_hp']);
    $alamat         = test_input($data['alamat']);


    if ($kode_supplier == null || $nama == null || $tgl_daftar == null || $no_hp == null || $alamat == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }



    $sql   = "insert into supplier (kode_supplier, nama, tgl_daftar, no_hp, alamat)
                values
              ('$kode_supplier', '$nama', '$tgl_daftar', '$no_hp', '$alamat')";

    $query = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return true;
}



/**
 * !Edit Supplier
 */

function editSupplier(array $data): bool
{
    global $conn;

    $kode_supplier  = test_input($data['kode_supplier']);
    $nama           = test_input($data['nama']);
    $tgl_daftar     = test_input($data['tgl_daftar']);
    $no_hp          = test_input($data['no_hp']);
    $alamat         = test_input($data['alamat']);


    if ($kode_supplier == null || $nama == null || $tgl_daftar == null || $no_hp == null || $alamat == null) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }

    $sql  = "update supplier set nama='$nama', tgl_daftar='$tgl_daftar', no_hp='$no_hp', alamat='$alamat' where kode_supplier='$kode_supplier'";

    $query = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return true;
}


/**
 * ! Hapus Supplier
 */

function hapusSupplier(array $data): bool
{
    global $conn;

    $kode_supplier = $data['kode_supplier'];
    $query = mysqli_query($conn, "delete from supplier where kode_supplier = '$kode_supplier'");

    if (mysqli_affected_rows($conn) === -1) {

        echo "
            <script>
                alert ('Data supplier masih digunakan tidak bisa dihapus!');
                window.location.href='?page=supplier';
            </script>
            ";

        return false;
    }

    mysqli_close($conn);
    return true;
}




//? End CRUD Supplier




//? Start Edit Account



/**
 * ! Edit Profile User
 */


function editProfile(array $data): bool
{
    global $conn;

    $id                 = test_input($_GET['id']);
    $nama               = htmlspecialchars($data['nama']);
    $username           = strtolower(stripslashes($data['username']));

    $queryCek           = mysqli_query($conn, "select id, username from users where username = '$username'");
    $resultCek          = mysqli_fetch_assoc($queryCek);

    if ($username == null || $nama == null || trim($username) == "" || trim($nama) == "") {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }



    if ($resultCek['id'] == $id && $resultCek['username'] == $username) {

        $sql    = "update users set nama = '$nama' where id = $id";
        $query   = mysqli_query($conn, $sql);
    } else {

        if ($resultCek != null) {

            echo "
                    <script>
                        alert ('Username sudah digunakan!');
                    </script>
                ";

            return false;
        }

        $sql    = "update users set username = '$username', nama = '$nama' where id = $id";
        $query   = mysqli_query($conn, $sql);
    }


    mysqli_close($conn);
    return true;
}




/**
 * ! Edit Password User
 */


function editPassword(array $data): bool
{
    global $conn;

    $id                 = test_input($_GET['id']);
    $old_password       = mysqli_real_escape_string($conn, $data['old_password']);
    $new_password       = mysqli_real_escape_string($conn, $data['password']);
    $confirm_password   = mysqli_real_escape_string($conn, $data['confirm_password']);

    $queryCek           = mysqli_query($conn, "select id, password from users where id = $id");
    $resultCek          = mysqli_fetch_assoc($queryCek);

    if (
        $old_password == null || $new_password == null || $confirm_password == null ||
        trim($old_password) == "" || trim($new_password) == "" || trim($confirm_password) == ""
    ) {
        echo "
            <script>
                alert ('Data tidak boleh kosong!');
            </script>
             ";

        return false;
    }


    if (password_verify($old_password, $resultCek['password'])) {

        if ($new_password !== $confirm_password) {

            echo "
                <script>
                    alert ('Konfirmasi password harus sama!');
                </script>
                 ";

            return false;
        }


        $password = password_hash($new_password, PASSWORD_BCRYPT);

        $sql    = "update users set password = '$password' where id = $id";
        $query   = mysqli_query($conn, $sql);
    } else {

        echo "
            <script>
                alert ('Password lama anda salah!');
            </script>
             ";

        return false;
    }


    mysqli_close($conn);
    return true;
}



//? End Edit Account