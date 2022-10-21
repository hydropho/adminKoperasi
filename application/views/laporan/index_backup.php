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
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('alert_message') ?>
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Laporan</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th style="min-width: 100px">Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Semua Pinjaman</td>
                                        <td><?= $jumlahPinjaman ?></td>
                                        <td><?= 'Rp. ' . number_format($totalPinjaman, 2, ',', '.') ?></td>
                                        <td><a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printPinjaman') ?>"><span><i class="las la-print me-3 scale5"></i>Print PDF</span></a>
                                            <a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printPinjamanExcel') ?>"><i class="las la-print me-3 scale5"></i>Print Excel</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pinjaman Aktif</td>
                                        <td><?= $jumlahPinjamanAktif ?></td>
                                        <td><?= 'Rp. ' . number_format($totalPinjamanAktif, 2, ',', '.') ?></td>
                                        <td><a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printPinjamanAktif') ?>"><i class="las la-print me-3 scale5"></i>Print PDF</a>
                                            <a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printPinjamanAktifExcel') ?>"><i class="las la-print me-3 scale5"></i>Print Excel</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Semua Simpanan</td>
                                        <td><?= $jumlahSimpanan ?></td>
                                        <td><?= 'Rp. ' . number_format($totalSimpanan, 2, ',', '.') ?></td>
                                        <td><a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printSimpanan') ?>"><i class="las la-print me-3 scale5"></i>Print PDF</a>
                                            <a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printSimpananExcel') ?>"><i class="las la-print me-3 scale5"></i>Print Excel</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Simpanan Aktif</td>
                                        <td><?= $jumlahSimpananAktif ?></td>
                                        <td><?= 'Rp. ' . number_format($totalSimpananAktif, 2, ',', '.') ?></td>
                                        <td><a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printSimpananAktif') ?>"><i class="las la-print me-3 scale5"></i>Print PDF</a>
                                            <a class="btn btn-primary me-3 btn-rounded" href="<?= base_url('laporan/printSimpananAktifExcel') ?>"><i class="las la-print me-3 scale5"></i>Print Excel</a>
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
</div>