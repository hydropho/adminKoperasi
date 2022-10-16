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
                        <div class="d-flex col-sm- justify-content-center align-items-center">
                            <button class="btn btn-primary btn-rounded btn-md mx-3" data-bs-toggle="modal"
                                data-bs-target="#basicModal">Bayar</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('alert_message') ?>
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No Pinjaman</th>
                                        <th>Angsuran Ke</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Angsuran (tanpa denda)</th>
                                        <th>Sisa Bayar</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <?php
                                if ($user['level'] == 2) {
                                    $angsuran = $this->db->get('angsuran')->result_array();
                                } else {
                                    $pinjaman = $this->db->get_where('pinjaman', ['username' => $user['username']])->result_array();
                                    foreach ($pinjaman as $pj) {
                                        $angsuran = $this->db->get_where('angsuran', ['no_pinjaman' => $pj['no_pinjaman']])->result_array();
                                    }
                                }

                                foreach ($angsuran as $dt) :
                                    $no_pinjaman = $dt['no_pinjaman'];
                                    $query = "SELECT * FROM angsuran WHERE STATUS = 0 AND no_pinjaman = $no_pinjaman  ORDER BY id ASC LIMIT 1";
                                    $angsuran_ke = $this->db->query($query)->row_array();
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?= 'PJ-' . $dt['no_pinjaman'] ?></td>
                                        <td><?= $dt['angsuran'] ?></td>
                                        <td><?= $dt['jatuh_tempo'] ?></td>
                                        <td><?= 'Rp. ' . number_format($dt['bayar'], 2, ',', '.') ?></td>
                                        <td><?= 'Rp. ' . number_format($dt['sisa'], 2, ',', '.') ?></td>
                                        <?php if ($user['level'] == 1) : ?>
                                        <td>
                                            <?php if ($dt['status'] == 0) : ?>
                                            <span class="badge light badge-danger">Belum Lunas</span>
                                            <?php elseif ($dt['status'] == 1) : ?>
                                            <span class="badge light badge-warning">Pending</span>
                                            <?php else : ?>
                                            <span class="badge light badge-success">Lunas</span>
                                            <?php endif; ?>
                                        </td>
                                        <?php else : ?>
                                        <td>
                                            <?php if ($dt['status'] == 0) : ?>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $dt['id'] ?>"><span
                                                    class="badge light badge-danger">Belum Lunas</span></a>
                                            <?php elseif ($dt['status'] == 1) : ?>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $dt['id'] ?>"><span
                                                    class="badge light badge-warning">Pending</span></a>
                                            <?php else : ?>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $dt['id'] ?>"><span
                                                    class="badge light badge-success">Lunas</span></a>
                                            <?php endif; ?>
                                        </td>
                                        <?php endif; ?>

                                    </tr>

                                    <div class="bootstrap-modal">
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal<?= $dt['id'] ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ubah Status</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Ubah status untuk mengonfirmasi pembayaran
                                                        user.<br><strong>TIDAK BISA MENGGANTI STATUS USER YANG SUDAH
                                                            ATAU BELUM
                                                            BAYAR</strong></div>
                                                    <div class="modal-footer">
                                                        <?php if ($dt['status'] == 1) : ?>
                                                        <a href="<?= base_url('pinjaman/tolak/') . $dt['id']; ?>">
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary">Tolak</button></a>
                                                        <a href="<?= base_url('pinjaman/konfirmasi/') . $dt['id']; ?>">
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary">Konfirmasi</button></a>
                                                        <?php else : ?>
                                                        <button type="button" class="btn btn-sm btn-danger light"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <form action="<?= base_url('pinjaman/bayar') ?>" method="POST">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal</label>
                                                            <input type="date" class="form-control"
                                                                value="<?= $tanggal->format('Y-m-d') ?>" readonly
                                                                name="tgl_bayar">
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            value="<?= $angsuran_ke['id'] ?>" name="id" hidden>
                                                        <div class="mb-3">
                                                            <label class="form-label">No Pinjaman</label>
                                                            <input type="text" class="form-control"
                                                                value="<?= 'PJ-' . $angsuran_ke['no_pinjaman'] ?>"
                                                                readonly name="no_pinjaman">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Angsuran Ke</label>
                                                            <input type="number" class="form-control" placeholder="Rp"
                                                                name="angsuran" value="<?= $angsuran_ke['angsuran'] ?>"
                                                                readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Angsuran</label>
                                                            <input type="text" class="form-control"
                                                                name="pinjaman_pokok" readonly
                                                                value="<?= 'Rp. ' . number_format($angsuran_ke['bayar'], 2, ',', '.') ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <?php
                                                                $jatuh_tempo = new DateTime($angsuran_ke['jatuh_tempo']);
                                                                if ($tanggal > $jatuh_tempo) {
                                                                    $interval = $tanggal->diff($jatuh_tempo);
                                                                    $hari = $interval->d;

                                                                    $denda = $angsuran_ke['bayar'] * (1 * $hari / 100);
                                                                } else {
                                                                    $denda = 0;
                                                                } ?>
                                                            <label class="form-label">Denda</label>
                                                            <input type="text" class="form-control" placeholder="0"
                                                                name="bunga" readonly
                                                                value="<?= 'Rp. ' . number_format($denda, 2, ',', '.') ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Jumlah Bayar</label>
                                                            <input type="text" class="form-control" name="jangka_waktu"
                                                                readonly
                                                                value="<?= 'Rp. ' . number_format($angsuran_ke['bayar'] + $denda, 2, ',', '.') ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Bayar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>