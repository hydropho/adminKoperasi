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
                            <form>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>

                                        <input type="date" class="form-control" placeholder="1234 Main St" value="<?= $tanggal->format('Y-m-d') ?>" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" value="<?= $user['username'] ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah</label>
                                            <input type="text" class="form-control" placeholder="Rp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bunga</label>
                                            <input type="text" class="form-control" placeholder="%">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jangka Waktu</label>
                                        <input type="text" class="form-control" placeholder="Bulan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Perbulan</label>
                                        <input type="text" class="form-control" placeholder="Rp">
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