<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-notebook icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Data Stok Barang
                    <div class="page-title-subheading">
                        Data Stok Barang adalah halaman daftar data stok barang.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <a href="?page=stok_brg&aksi=tambah" class="btn btn-info mb-2">
                <i class="fas fa-plus"></i> Tambah
            </a>


            <div class="main-card mb-3 card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Warna</th>
                                    <th>Harga</th>
                                    <th class="text-center">Stok Akhir</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $no = 1;
                                $rows = query("select * from stok_barang order by kode_brg asc");

                                foreach ($rows as $row) {

                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $row['kode_brg'] ?></td>
                                        <td><?= $row['nama_brg'] ?></td>
                                        <td><?= $row['warna'] ?></td>
                                        <td>Rp<?= number_format($row['harga'], 0, ",", ".") ?></td>
                                        <td class="text-center"><?= $row['stok_akhir'] ?></td>
                                        <td class="text-center">
                                            <a href="?page=stok_brg&aksi=edit&kode_brg=<?= $row['kode_brg']; ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <a onclick="return confirm('Apakah anda yakin ingin hapus data?')" href="?page=stok_brg&aksi=hapus&kode_brg=<?= $row['kode_brg']; ?>" class="btn btn-danger btn-sm">
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