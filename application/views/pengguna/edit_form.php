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
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $sub_title ?></h4>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="card-body">
                            <div class="basic-form">
                                <?= form_open_multipart('pengguna/edit_profile'); ?>
                                <?= $this->session->flashdata('alert_message') ?>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Username"
                                            value="<?= $userdata['username']; ?>" name="username" id="username"
                                            readonly>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap"
                                            value="<?= $userdata['nama_lengkap']; ?>" name="nama_lengkap"
                                            id="nama_lengkap">

                                        <?php if (form_error('nama_lengkap')) : ?>
                                        <?= form_error('nama_lengkap', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">

                                        <input type="text" class="form-control" placeholder="Tempat Lahir"
                                            name="tempat_lahir" id="tempat_lahir"
                                            value="<?= $userdata['tempat_lahir']; ?>">

                                        <?php if (form_error('tempat_lahir')) : ?>
                                        <?= form_error('tempat_lahir', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">

                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                            value="<?= $userdata['tanggal_lahir']; ?>">


                                        <?php if (form_error('tanggal_lahir')) : ?>
                                        <?= form_error('tanggal_lahir', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">

                                        <select class="default-select form-control wide" name="jenis_kelamin"
                                            id="jenis_kelamin" value="<?= $userdata['jenis_kelamin']; ?>">
                                            <?php if ($userdata['jenis_kelamin'] == 'Laki - Laki') : ?>
                                            <option data-display="<?= $userdata['jenis_kelamin'] ?>">Laki - Laki
                                            </option>
                                            <option value="Perempuan">Perempuan</option>
                                            <?php else : ?>
                                            <option data-display="<?= $userdata['jenis_kelamin'] ?>">Perempuan
                                            </option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <?php endif; ?>
                                        </select>
                                        <?php if (form_error('jenis_kelamin')) : ?>
                                        <?= form_error('jenis_kelamin', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                                            id="alamat" value="<?= $userdata['alamat']; ?>">

                                        <?php if (form_error('alamat')) : ?>
                                        <?= form_error('alamat', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">No HP</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="No HP" name="no_hp"
                                            id="no_hp" value="<?= $userdata['no_hp']; ?>">

                                        <?php if (form_error('no_hp')) : ?>
                                        <?= form_error('no_hp', '<div class="invalid-feedback-active">', '</div>') ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Foto Profile</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-file-input form-control" name="profil"
                                            id="profil">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
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
<!--**********************************
            Content body end
        ***********************************-->