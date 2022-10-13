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
                                        <label class="form-label">Jangka Waktu Pinjaman</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Jangka Waktu Pinjaman">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pokok Pinjaman</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Pokok Pinjaman">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Bunga(%)</label>
                                        <input type="text" class="form-control">
                                    </div>


                                    <button type="submit" class="btn btn-primary">Kalkulasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>