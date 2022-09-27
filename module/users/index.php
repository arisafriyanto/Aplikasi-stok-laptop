<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Data Users
                    <div class="page-title-subheading">
                        Data Users adalah halaman daftar data users.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <a href="?page=users&aksi=tambah" class="btn btn-info mb-2">
                <i class="fas fa-user-plus"></i> Tambah
            </a>


            <div class="main-card mb-3 card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $no = 1;
                                $rows = query("select * from users order by nama asc");

                                foreach ($rows as $row) {

                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?>.</th>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['username'] ?></td>

                                        <td class="text-center">
                                            <a href="?page=account&aksi=edit&id=<?= $row['id']; ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <a onclick="return confirm('Apakah anda yakin ingin hapus user?')" href="?page=users&aksi=hapus&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">
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