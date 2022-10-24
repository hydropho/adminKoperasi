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
                        <form action="" method="POST" id="formPrint">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Dari Tanggal</label>
                                    <input type="date" class="form-control" name="tgl_awal">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Sampai Tanggal</label>
                                    <input type="date" class="form-control" name="tgl_akhir">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-5 col-md-4">
                                    <label class="form-label">Jenis Laporan</label>
                                    <select id="inputState" name="jenis_laporan" class="default-select form-control wide">
                                        <option selected value="" disabled>Pilih Jenis Laporan</option>
                                        <option value="pinjaman">Laporan Pinjaman</option>
                                        <option value="simpananPokok">Laporan Simpanan Pokok</option>
                                        <option value="simpananWajib">Laporan Simpanan Wajib</option>
                                        <option value="simpananSukarela">Laporan Simpanan Sukarela</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="cekLaporan" formaction="<?= base_url('laporan/cekLaporan'); ?>">Cek Laporan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>