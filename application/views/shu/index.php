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
                        <?php if ($this->session->userdata('level') == 2) : ?>
                            <a class="btn btn-primary btn-rounded btn-md mx-3" href="<?= base_url('laporan/printSHU') ?>">Cetak Laporan</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Simpanan</th>
                                        <th>Pinjaman</th>
                                        <th>SHU Simpanan</th>
                                        <th>SHU Pinjaman</th>
                                        <th>Total SHU</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if ($this->session->userdata('level') == 2) :
                                        $users = $this->db->get('user')->result_array();

                                        foreach ($users as $user) :
                                            $username = $user['username'];
                                            $query = " SELECT `username`, (SELECT SUM(`pinjaman_pokok`) FROM `pinjaman` WHERE `username` = '$username' AND keterangan = '2') AS pinjaman,
                                                    (SELECT SUM(`simpanan`) FROM `simpanan`  WHERE `username` = '$username' AND status = '2') AS simpanan
                                                    FROM `user` WHERE `username` = '$username'";
                                            $total = $this->db->query($query)->row_array()
                                    ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td class="text-center"><?= $user['username'] ?></td>
                                                <?php if ($total['simpanan'] == NULL) : ?>
                                                    <td>-</td>
                                                <?php else : ?>
                                                    <td><?= "Rp. " . number_format($total['simpanan'], 2, ',', '.'); ?></td>
                                                <?php endif; ?>

                                                <?php if ($total['pinjaman'] == NULL) : ?>
                                                    <td>-</td>
                                                <?php else : ?>
                                                    <td><?= "Rp. " . number_format($total['pinjaman'], 2, ',', '.'); ?></td>
                                                <?php endif; ?>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>
                                    <?php
                                    $no = 1;
                                    if ($this->session->userdata('level') == 1) :

                                        $username = $this->session->userdata('username');
                                        $query = " SELECT `username`, (SELECT SUM(`pinjaman_pokok`) FROM `pinjaman` WHERE `username` = '$username' AND keterangan = '2') AS pinjaman,
                                                    (SELECT SUM(`simpanan`) FROM `simpanan`  WHERE `username` = '$username' AND status = '2') AS simpanan
                                                    FROM `user` WHERE `username` = '$username'";
                                        $total = $this->db->query($query)->row_array()
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-center"><?= $user['username'] ?></td>
                                            <?php if ($total['simpanan'] == NULL) : ?>
                                                <td>-</td>
                                            <?php else : ?>
                                                <td><?= "Rp. " . number_format($total['simpanan'], 2, ',', '.'); ?></td>
                                            <?php endif; ?>

                                            <?php if ($total['pinjaman'] == NULL) : ?>
                                                <td>-</td>
                                            <?php else : ?>
                                                <td><?= "Rp. " . number_format($total['pinjaman'], 2, ',', '.'); ?></td>
                                            <?php endif; ?>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>