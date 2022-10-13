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
                                        <th>Username</th>
                                        <th>Pinjaman Pokok</th>
                                        <th>Bunga</th>
                                        <th>Jangka Waktu</th>
                                        <th>Tanggal Pinjaman</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Angsuran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $datapinjaman = $this->db->get('pinjaman')->result_array();

                                    foreach ($datapinjaman as $dp) :
                                    ?>
                                        <tr>
                                            <td><?= $dp['no_pinjaman'] ?></td>
                                            <td><?= $dp['username'] ?></td>
                                            <td><?= $dp['pinjaman_pokok'] ?></td>
                                            <td><?= $dp['bunga'] ?></td>
                                            <td><?= $dp['jangka_waktu'] ?></td>
                                            <td><?= $dp['tgl_pinjaman'] ?></td>
                                            <td><?= $dp['tgl_selesai'] ?></td>
                                            <td><?= $dp['angsuran'] ?></td>
                                            <td><span class="badge light badge-success">Paid</span></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>