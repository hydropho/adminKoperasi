<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-slider owl-carousel">
                    <div class="items">
                        <div class="card-bx bg-orange">
                            <img class="pattern-img" src="<?= base_url('assets/images/pattern/pattern8.png') ?>" alt="">
                            <div class="card-info text-white">
                                <h2 class="text-white card-balance mt-4">
                                    <?php if ($simpanan_pokok['simpanan'] == null) {
                                        echo "Rp. " . number_format(0, 2, ',', '.');
                                    } else {
                                        echo "Rp. " . number_format($simpanan_pokok['simpanan'], 2, ',', '.');
                                    } ?>
                                </h2>
                                <p class="fs-24">Simpanan Pokok</p>
                            </div>
                        </div>
                    </div>

                    <div class="items">
                        <div class="card-bx bg-blue">
                            <img class="pattern-img" src="<?= base_url('assets/images/pattern/pattern6.png') ?>" alt="">
                            <div class="card-info text-white">
                                <h2 class="text-white card-balance mt-4">
                                    <?php if ($simpanan_wajib['simpanan'] == null) {
                                        echo "Rp. " . number_format(0, 2, ',', '.');
                                    } else {
                                        echo "Rp. " . number_format($simpanan_wajib['simpanan'], 2, ',', '.');
                                    } ?></h2>
                                <p class="fs-24">Simpanan Wajib</p>
                            </div>
                        </div>
                    </div>

                    <div class="items">
                        <div class="card-bx bg-purpel">
                            <img class="pattern-img" src="<?= base_url('assets/images/pattern/pattern10.png') ?>"
                                alt="">
                            <div class="card-info text-white">
                                <h2 class="text-white card-balance mt-4">
                                    <?php if ($simpanan_sukarela['simpanan'] == null) {
                                        echo "Rp. " . number_format(0, 2, ',', '.');
                                    } else {
                                        echo "Rp. " . number_format($simpanan_sukarela['simpanan'], 2, ',', '.');
                                    } ?></h2>
                                <p class="fs-24">Simpanan Sukarela</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="me-auto mb-sm-0 mb-4">
                                    <h4 class="fs-20 text-black">Riwayat Simpanan</h4>
                                    <span class="fs-12">Riwayat simpanan yang sudah masuk.</span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-rounded btn-md mx-3"
                                    data-bs-toggle="modal" data-bs-target="#basicModal">+Tambah
                                    Simpanan</button>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('alert_message') ?>
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No Simpanan</th>
                                                <th>Username</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Simpanan</th>
                                                <th>Jenis Simpanan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dataSimpanan = $this->db->get_where('simpanan', ['username' => $user['username']])->result_array();

                                            foreach ($dataSimpanan as $ds) :
                                            ?>
                                            <tr>
                                                <td>SM-<?= $ds['no_simpanan'] ?></td>
                                                <td><?= $ds['username'] ?></td>
                                                <td><?= $ds['tgl_simpanan'] ?></td>
                                                <td><?= "Rp. " . number_format($ds['simpanan'], 2, ',', '.'); ?></td>
                                                <td><?= $ds['jenis_simpanan'] ?></td>
                                                <td>
                                                    <?php if ($ds['status'] == 0) : ?>
                                                    <span class="badge light badge-danger">Belum Lunas</span>
                                                    <?php elseif ($ds['status'] == 1) : ?>
                                                    <span class="badge light badge-warning">Pending</span>
                                                    <?php else : ?>
                                                    <span class="badge light badge-success">Lunas</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Simpanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('simpanan/tambah_user') ?>" method="POST">
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control"
                                                        value="<?= $tanggal->format('Y-m-d') ?>" readonly
                                                        name="tgl_simpanan">
                                                </div>
                                                <input type="text" class="form-control" value="<?= $user['username'] ?>"
                                                    readonly name="username" hidden>
                                                <div class="mb-3">
                                                    <label class="form-label">Simpanan</label>
                                                    <input type="number" class="form-control" placeholder="Rp"
                                                        name="simpanan" required
                                                        oninvalid="this.setCustomValidity('Simpanan harus di isi!')"
                                                        oninput="this.setCustomValidity('')">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Simpanan</label>
                                                    <select class="default-select form-control wide mb-3"
                                                        name="jenis_simpanan" required>
                                                        <option>Simpanan Pokok</option>
                                                        <option>Simpanan Wajib</option>
                                                        <option>Simpanan Sukarela</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Tambah
                                                        Simpanan</button>
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
    </div>
</div>
</div>
</div>
</div>