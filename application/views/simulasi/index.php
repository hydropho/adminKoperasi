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
            <div class="col-xl-3 col-xxl-7">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <div>
                            <h4 class="card-title mb-2"><?= $title ?></h4>
                            <span class="fs-12"><?= $sub_title . ', ' . $corp_name ?></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="simulasi" id="simulasi_form">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Pokok Pinjaman</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="Rp" id="pokokPinjaman"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Jangka Waktu (Bulan)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="Bulan" id="jangkaWaktu"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Bunga (% per )</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="%" value="1" readonly
                                            id="bunga">
                                    </div>
                                </div>
                                <div class="card-footer border-0 pt-0">
                                    <button type="submit"
                                        class="btn btn-primary d-block btn-lg text-uppercase">Kalkulasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-5">
                <div class="card">
                    <div class="card-header pb-0 border-0">
                        <div>
                            <h4 class="card-title mb-2">Pinjaman</h4>
                            <span class="fs-12">Hasil Kalkulasi.</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>
                                <p class="mb-2 fs-16">Pokok Pinjaman :
                                    <b id="outPinjamanPokok"></b>
                                </p>
                            </li>
                            <li>
                                <p class="mb-2 fs-16">Jangka Waktu : <b id="outJangkaWaktu"></b></p>
                            </li>
                            <li>
                                <p class="mb-2 fs-16">Bunga : <b id="outBunga"></b></p>
                            </li>
                            <br>
                            <li>
                                <p class="mb-2 fs-16">Angsuran pokok per bulan :
                                    <b id="outAngsuranPokok"></b>
                                </p>
                            </li>
                            <li>
                                <p class="mb-2 fs-16">Angsuran bunga per bulan :
                                    <b id="outAngsuranBunga"></b>
                                </p>
                            </li>
                            <hr>
                            <li>
                                <p class="mb-2 fs-16">Total Angsuran per bulan :
                                    <b id="outTotalAngsuran"></b>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>