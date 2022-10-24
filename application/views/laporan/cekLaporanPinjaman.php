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
                                        <th class="center">No Pinjaman</th>
                                        <th>Username</th>
                                        <th class="center">Pinjaman Pokok</th>
                                        <th class="center">Tanggal Pinjaman</th>
                                        <th class="center">Jangka Waktu</th>
                                        <th class="center">Angsuran</th>
                                        <th class="center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pinjaman as $pj) : ?>
                                        <tr>
                                            <td>PJ-<?= $pj['no_pinjaman'] ?></td>
                                            <td><?= $pj['username'] ?></td>
                                            <td><?= 'Rp. ' . number_format($pj['pinjaman_pokok'], 2, ',', '.') ?></td>
                                            <td><?= $pj['tgl_pinjaman'] ?></td>
                                            <td><?= $pj['jangka_waktu'] . ' Bulan' ?></td>
                                            <td><?= 'Rp. ' . number_format($pj['angsuran'], 2, ',', '.') ?></td>
                                            <td><?php if ($pj['keterangan'] == 2) {
                                                    echo 'Aktif';
                                                } elseif ($pj['keterangan'] == 1) {
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
                                            <td class="left fs-18"><strong>Total Pinjaman Bersih</strong></td>
                                            <td class="right fs-18">
                                                <strong><?= 'Rp. ' . number_format($totalPinjaman, 2, ',', '.') ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left fs-18"><strong>Total Pinjaman + Bunga</strong></td>
                                            <td class="right fs-18">
                                                <strong><?= 'Rp. ' . number_format($totalBunga, 2, ',', '.') ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>