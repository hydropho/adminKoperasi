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
                                    $datapinjaman = $this->db->get('pinjaman')->result_array();

                                    foreach ($datapinjaman as $dp) :
                                    ?>
                                        <tr>
                                            <td>01</td>
                                            <td>Tiger Nixon</td>
                                            <td>1.000.000</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>


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