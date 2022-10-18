<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $title ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $sub_title ?></a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card mt-3">
                    <div class="card-header"> Bukti Bayar <P><?= $tanggal->format('Y-m-d') ?></P> <span class="float-end">
                            <strong>Status:</strong> Pending</span> </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <h6>From:</h6>
                                <div> <strong><?= $corp_name ?></strong> </div>
                                <div>Madalinskiego 8</div>
                                <div>71-101 Szczecin, Poland</div>
                                <div>Email: info@webz.com.pl</div>
                                <div>Phone: +48 444 666 3333</div>
                            </div>
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <h6>To:</h6>
                                <div> <strong>Bob Mart</strong> </div>
                                <div>Attn: Daniel Marek</div>
                                <div>43-190 Mikolow, Poland</div>
                                <div>Email: marek@daniel.com</div>
                                <div>Phone: +48 123 456 789</div>
                            </div>
                            <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                <div class="row align-items-center">
                                    <div class="col-sm-9">
                                        <div class="brand-logo mb-3">
                                            <img class="logo-abbr me-2" width="50" src="images/logo.png" alt="">
                                            <img class="logo-compact" width="110" src="images/logo-text.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 mt-3"> <img src="images/qr.png" alt="" class="img-fluid width110"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center text-center">No Pinjaman</th>
                                        <th class="text-center">Angsuran Ke</th>
                                        <th class="right text-center">Tagihan</th>
                                        <th class="right text-center">Jatuh Tempo</th>
                                        <th class="center text-center">Denda</th>
                                        <th class="right text-center">Total</th>
                                        <th class="right text-center">Sisa Tagihan</th>
                                        <th class="right text-center">Status</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($user['level'] == 2) {
                                        $angsuran = $this->db->get('angsuran')->result_array();
                                    } else {
                                        $pinjaman = $this->db->get_where('pinjaman', ['username' => $user['username']])->result_array();
                                        foreach ($pinjaman as $pj) {
                                            $angsuran = $this->db->get_where('angsuran', ['no_pinjaman' => $pj['no_pinjaman']])->result_array();
                                        }
                                    }

                                    foreach ($angsuran as $dt) :
                                        $no_pinjaman = $dt['no_pinjaman'];
                                        $query = "SELECT * FROM angsuran WHERE STATUS = 0 AND no_pinjaman = $no_pinjaman  ORDER BY id ASC LIMIT 1";
                                        $angsuran_ke = $this->db->query($query)->row_array();
                                    ?>
                                        <tr>
                                            <td class="center text-center">PJ-<?= $dt['no_pinjaman']; ?></td>
                                            <td class="left strong text-center"><?= $dt['angsuran'] ?></td>
                                            <td class="left text-center"><?= 'Rp. ' . number_format($dt['bayar'], 2, ',', '.') ?></td>
                                            <td class="right text-center"><?= $dt['jatuh_tempo'] ?></td>
                                            <td class="center text-center">-</td>
                                            <td class="right text-center">-</td>
                                            <td class="right text-center"><?= 'Rp. ' . number_format($dt['sisa'], 2, ',', '.') ?></td>
                                            <td class="right text-center"><?php if ($dt['status'] == 0) : ?>
                                                    <span class="badge light badge-danger">Belum Lunas</span>
                                                <?php elseif ($dt['status'] == 1) : ?>
                                                    <span class="badge light badge-warning">Pending</span>
                                                <?php else : ?>
                                                    <span class="badge light badge-success">Lunas</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"> </div>
                            <div class="col-lg-4 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Bunga(1%)</strong></td>
                                            <td class="right"></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right"><strong>$7.477,36</strong><br>
                                                <strong>0.15050000 BTC</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>