<?php

require_once __DIR__ . "/../functions.php";

$searchTerm = $_GET['term'];

$sql = "select kode_brg, nama_brg from stok_barang where kode_brg 
        like '%" . $searchTerm . "%' 
        or nama_brg like '%" . $searchTerm . "%' ORDER BY kode_brg ASC";
$hasil = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['kode_brg'] . " | " . $row['nama_brg'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
