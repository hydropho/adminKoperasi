<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $title ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $sub_title ?></a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $sub_title ?></h4>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Cetak</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('laporan/proses/pdf/' . $tgl_awal . '/' . $tgl_akhir . '/' . $jenis_laporan) ?>">PDF</a>
                                <a class="dropdown-item" href="<?= base_url('laporan/proses/excel/' . $tgl_awal . '/' . $tgl_akhir . '/' . $jenis_laporan) ?>">Excel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">No Simpanan</th>
                                        <th>Username</th>
                                        <th class="center">Simpanan</th>
                                        <th class="center">Tanggal Simpanan</th>
                                        <th class="center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($simpanan as $sm) : ?>
                                        <tr>
                                            <td>SM-<?= $sm['no_simpanan'] ?></td>
                                            <td><?= $sm['username'] ?></td>
                                            <td><?= 'Rp. ' . number_format($sm['simpanan'], 2, ',', '.') ?></td>
                                            <td><?= $sm['tgl_simpanan'] ?></td>
                                            <td><?php if ($sm['status'] == 2) {
                                                    echo 'Aktif';
                                                } elseif ($sm['status'] == 1) {
                                                    echo 'Pending';
                                                } else {
                                                    echo 'Ditolak';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"> </div>
                            <div class="col-lg-4 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left fs-18"><strong>Total Simpanan</strong></td>
                                            <td class="right fs-18">
                                                <strong><?= 'Rp. ' . number_format($totalSimpanan, 2, ',', '.') ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="basicModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Pinjaman</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('pinjaman/tambah') ?>" method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" value="<?= $tanggal->format('Y-m-d') ?>" readonly name="tgl_pinjaman">
                                            </div>
                                            <input type="text" class="form-control" value="<?= $user['username'] ?>" readonly name="username" hidden>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" placeholder="Rp" name="pinjaman_pokok" required oninvalid="this.setCustomValidity('Jumlah harus di isi!')" oninput="this.setCustomValidity('')">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Bunga (%)</label>
                                                <input type="number" class="form-control" placeholder="%" name="bunga" value="1" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jangka Waktu</label>
                                                <input type="number" class="form-control" placeholder="Bulan" name="jangka_waktu" required oninvalid="this.setCustomValidity('Jangka Waktu harus diisi!')" oninput="this.setCustomValidity('')">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah Pinjaman</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>