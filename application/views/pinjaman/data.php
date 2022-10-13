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
                                        <th>No Pinjaman</th>
                                        <th>Username</th>
                                        <th>Pinjaman Pokok</th>
                                        <th>Bunga</th>
                                        <th>Jangka Waktu</th>
                                        <th>Tanggal Pinjaman</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Angsuran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $datapinjaman = $this->db->get('pinjaman')->result_array();

                                    foreach ($datapinjaman as $dp) :
                                    ?>
                                    <tr>
                                        <td><?= $dp['no_pinjaman'] ?></td>
                                        <td><?= $dp['username'] ?></td>
                                        <td><?= $dp['pinjaman_pokok'] ?></td>
                                        <td><?= $dp['bunga'] ?></td>
                                        <td><?= $dp['jangka_waktu'] ?></td>
                                        <td><?= $dp['tgl_pinjaman'] ?></td>
                                        <td><?= $dp['tgl_selesai'] ?></td>
                                        <td><?= $dp['angsuran'] ?></td>
                                        <td>
                                            <?php if ($dp['keterangan'] == 2) : ?>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $dp['username'] ?>"><span
                                                    class="badge light badge-success">Disetujui</span></a>
                                            <?php elseif ($dp['keterangan'] == 1) : ?>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $dp['username'] ?>"><span
                                                    class="badge light badge-warning">Pending</span></a>
                                            <?php else : ?>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $dp['username'] ?>"><span
                                                    class="badge light badge-danger">Ditolak</span></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <div class="bootstrap-modal">
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal<?= $dp['username'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konformasi Pinjaman</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Konfirmasi apakah pinjaman anggota diterima
                                                        atau ditolak.</div>
                                                    <div class="modal-footer">
                                                        <a href="<?= base_url('pinjaman/tolak/') . $dp['username']; ?>"><button
                                                                type="button"
                                                                class="btn btn-sm btn-danger light">Tolak</button></a>
                                                        <a
                                                            href="<?= base_url('pinjaman/setuju/') . $dp['username']; ?>"><button
                                                                type="button"
                                                                class="btn btn-sm btn-primary">Setuju</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>