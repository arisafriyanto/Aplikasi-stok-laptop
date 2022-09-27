<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-next-2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Data Barang Masuk
                    <div class="page-title-subheading">
                        Data Barang Masuk adalah halaman daftar data barang masuk.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">


            <a href="?page=brg_masuk&aksi=tambah" class="btn btn-info mb-2">
                <i class="fas fa-plus"></i> Tambah
            </a>


            <div class="main-card mb-3 card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Brg Masuk</th>
                                    <th>Nama Barang</th>
                                    <th>Supplier</th>
                                    <th>Tanggal Masuk</th>
                                    <th class="text-center">Stok Masuk</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $no = 1;
                                $rows = query("SELECT barang_masuk.kode_brg_masuk, barang_masuk.kode_brg, barang_masuk.
                                                tanggal,barang_masuk.stok_masuk, stok_barang.nama_brg, supplier.nama 
                                                From barang_masuk INNER JOIN stok_barang ON barang_masuk.kode_brg = stok_barang.kode_brg INNER JOIN supplier ON barang_masuk.kode_supplier = supplier.kode_supplier  ORDER BY kode_brg_masuk ASC");

                                foreach ($rows as $row) {

                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $row['kode_brg_masuk'] ?></td>
                                        <td><?= $row['nama_brg'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= date('d F Y', strtotime($row['tanggal'])) ?></td>
                                        <td class="text-center"><?= $row['stok_masuk'] ?></td>
                                        <td class="text-center">
                                            <a href="?page=brg_masuk&aksi=edit&kode_brg_masuk=<?= $row['kode_brg_masuk']; ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <a onclick="return confirm('Apakah anda yakin ingin hapus data?')" href="?page=brg_masuk&aksi=hapus&kode_brg_masuk=<?= $row['kode_brg_masuk']; ?>&kode_brg=<?= $row['kode_brg'] ?>&stok_masuk=<?= $row['stok_masuk'] ?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>