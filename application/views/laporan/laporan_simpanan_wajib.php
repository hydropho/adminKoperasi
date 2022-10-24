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
                        <form action="" method="POST">
                            <h1>Laporan Simpanan Wajib</h1>
                            <button type="submit" class="btn btn-primary" name="cetakPDF" formaction="<?= base_url('laporan/print/pdf'); ?>">Cetak Laporan PDF</button>
                            <button type="submit" class="btn btn-primary" name="cetakExcel" formaction="<?= base_url('laporan/print/excel'); ?>">Cetak Laporan Excel</button>
                            <button type="submit" class="btn btn-primary" name="kembali" formaction="<?= base_url('laporan'); ?>">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>