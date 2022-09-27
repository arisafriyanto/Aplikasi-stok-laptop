<?php

require_once __DIR__ . "/../functions.php";

$searchTerm = $_GET['term'];

$sql = "select kode_supplier, nama from supplier where kode_supplier 
        like '%" . $searchTerm . "%' 
        or nama like '%" . $searchTerm . "%' ORDER BY kode_supplier ASC";
$hasil = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['kode_supplier'] . " | " . $row['nama'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
