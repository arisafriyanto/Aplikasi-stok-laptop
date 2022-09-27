<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Data Supplier
                    <div class="page-title-subheading">
                        Data Supplier adalah halaman daftar data Supplier.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">


            <a href="?page=supplier&aksi=tambah" class="btn btn-info mb-2">
                <i class="fas fa-plus"></i> Tambah
            </a>


            <div class="main-card mb-3 card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Supplier</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal Daftar</th>
                                    <th>No.Handphone</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $no = 1;
                                $rows = query("select * from supplier order by kode_supplier asc");
                                foreach ($rows as $row) {

                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $row['kode_supplier'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= date('d F Y', strtotime($row['tgl_daftar'])) ?></td>
                                        <td><?= $row['no_hp'] ?></td>
                                        <td class="text-center">
                                            <a href="?page=supplier&aksi=edit&kode_supplier=<?= $row['kode_supplier']; ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <a onclick="return confirm('Apakah anda yakin ingin hapus data?')" href="?page=supplier&aksi=hapus&kode_supplier=<?= $row['kode_supplier'] ?>" class="btn btn-danger btn-sm">
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