<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-back-2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Data Barang Keluar
                    <div class="page-title-subheading">
                        Data Barang Keluar adalah halaman daftar data barang keluar.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">


            <a href="?page=brg_keluar&aksi=tambah" class="btn btn-info mb-2">
                <i class="fas fa-plus"></i> Tambah
            </a>


            <div class="main-card mb-3 card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Brg Keluar</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Keluar</th>
                                    <th class="text-center">Stok Keluar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $no = 1;
                                $rows = query("select barang_keluar.kode_brg_keluar, barang_keluar.kode_brg,
                                            barang_keluar.tanggal, barang_keluar.stok_keluar, stok_barang.nama_brg from barang_keluar, stok_barang where barang_keluar.kode_brg=stok_barang.kode_brg order by kode_brg_keluar asc");

                                foreach ($rows as $row) {

                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $row['kode_brg_keluar'] ?></td>
                                        <td><?= $row['nama_brg'] ?></td>
                                        <td><?= date('d F Y', strtotime($row['tanggal'])) ?></td>
                                        <td class="text-center"><?= $row['stok_keluar'] ?></td>

                                        <td class="text-center">
                                            <a href="?page=brg_keluar&aksi=edit&kode_brg_keluar=<?= $row['kode_brg_keluar']; ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <a onclick="return confirm('Apakah anda yakin ingin hapus data?')" href="?page=brg_keluar&aksi=hapus&kode_brg_keluar=<?= $row['kode_brg_keluar']; ?>&kode_brg=<?= $row['kode_brg'] ?>&stok_keluar=<?= $row['stok_keluar'] ?>" class="btn btn-danger btn-sm">
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