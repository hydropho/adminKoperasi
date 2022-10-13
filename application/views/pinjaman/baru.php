<!--**********************************
            Content body start
        ***********************************-->
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
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $sub_title ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url('pinjaman/tambah') ?>" method="POST">
                                <?= $this->session->flashdata('alert_message') ?>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" value="<?= $tanggal->format('Y-m-d') ?>"
                                            readonly name="tgl_pinjaman">
                                    </div>
                                    <input type="text" class="form-control" value="<?= $user['username'] ?>" readonly
                                        name="username" hidden>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <?php if (set_value('pinjaman_pokok')) : ?>
                                        <input type="number" class="form-control" placeholder="Rp" name="pinjaman_pokok"
                                            value="<?= set_value('pinjaman_pokok') ?>">
                                        <?php else : ?>
                                        <input type="number" class="form-control" placeholder="Rp"
                                            name="pinjaman_pokok">
                                        <?php endif; ?>
                                        <?php if (form_error('pinjaman_pokok')) : ?>
                                        <?= form_error('pinjaman_pokok', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Bunga (%)</label>
                                        <input type="number" class="form-control" placeholder="%" name="bunga" value="1"
                                            readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jangka Waktu</label>
                                        <?php if (set_value('jangka_waktu')) : ?>
                                        <input type="number" class="form-control" placeholder="Bulan"
                                            name="jangka_waktu" value="<?= set_value('jangka_waktu') ?>">
                                        <?php else : ?>
                                        <input type="number" class="form-control" placeholder="Bulan"
                                            name="jangka_waktu">
                                        <?php endif; ?>
                                        <?php if (form_error('jangka_waktu')) : ?>
                                        <?= form_error('jangka_waktu', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                        <button type="submit" class="btn btn-danger">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>