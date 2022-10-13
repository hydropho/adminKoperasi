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
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No Pinjaman</th>
                                        <th>Tanggal Bukti</th>
                                        <th>Bayar</th>
                                        <th>Sisa Bayar</th>
                                        <th>Denda</th>
                                        <th>Jumlah </th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <?php $angsuran = $this->db->get('angsuran')->result_array();

                                foreach ($angsuran as $dt) :
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $dt['no_pinjaman'] ?></td>
                                            <td><?= $dt['tgl_bukti'] ?></td>
                                            <td><?= $dt['bayar'] ?></td>
                                            <td><?= $dt['sisa'] ?></td>
                                            <td><?= $dt['denda'] ?></td>
                                            <td><?= $dt['jumlah'] ?></td>
                                            <td><span class="badge light badge-success">Paid</span></td>

                                        </tr>
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