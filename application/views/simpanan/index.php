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
                            <button class="btn btn-primary btn-block btn-rounded" data-bs-toggle="modal"
                                data-bs-target="#basicModal">Tambah Simpanan</button>
                        </div>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dataSimpanan = $this->db->get('simpanan')->result_array();

                                    foreach ($dataSimpanan as $ds) :
                                    ?>
                                    <tr>
                                        <td>PJ-<?= $ds['no_simpanan'] ?></td>
                                        <td><?= $ds['username'] ?></td>
                                        <td><?= $ds['tgl_simpanan'] ?></td>
                                        <td><?= "Rp. " . number_format($ds['simpanan'], 2, ',', '.'); ?></td>
                                        <td><?= $ds['jenis_simpanan'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="<?= base_url('simpanan/hapus/') . $ds['no_simpanan']; ?>"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
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
                                    <form action="<?= base_url('simpanan/tambah') ?>" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control"
                                                value="<?= $tanggal->format('Y-m-d') ?>" readonly name="tgl_simpanan">
                                        </div>
                                        <input type="text" class="form-control" value="<?= $user['username'] ?>"
                                            readonly name="username" hidden>
                                        <div class="mb-3">
                                            <label class="form-label">Simpanan</label>
                                            <input type="number" class="form-control" placeholder="Rp" name="simpanan"
                                                required oninvalid="this.setCustomValidity('Simpanan harus di isi!')"
                                                oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Simpanan</label>
                                            <select class="default-select form-control wide mb-3" name="jenis_simpanan"
                                                required>
                                                <option>Simpanan Pokok</option>
                                                <option>Simpanan Wajib</option>
                                                <option>Simpanan Sukarela</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Simpanan</button>
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