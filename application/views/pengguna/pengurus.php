<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $title?></a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)"><?= $sub_title?></a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= $sub_title;?></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Tempat lahir</th>
                                                <th>Tanggal lahir</th>
                                                <th>Jenis kelamin</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $level = $this->session->userdata('level');
                                            $queryUserdata = "SELECT `user`.`level`, `userdata`.*
                                                        FROM `user` JOIN `userdata`
                                                        ON `user`.`username` = `userdata`.`username`";
                                            $userdata = $this->db->query($queryUserdata)->result_array();

                                            foreach ($userdata as $ud) :
                                                if ($ud['level'] == 2) : 
                                        ?>
                                            <tr>
                                                
                                                <td><img class="rounded-circle" width="35" src="<?= base_url('assets/images/profile/').$ud['profil']?>" alt=""></td>
                                                <td><?= $ud['nama_lengkap']?></td>
                                                <td><?= $ud['username']?></td>
                                                <td><?= $ud['tempat_lahir']?></td>
                                                <td><?= $ud['tanggal_lahir']?></td>
                                                <td><a href="javascript:void(0);"><?= $ud['jenis_kelamin']?></a></td>
                                                <td><a href="javascript:void(0);"><?= $ud['alamat']?></a></td>
                                                <td><?= $ud['no_hp']?></td>
                                                <td>
													<div class="d-flex">
														<a href="<?= base_url('pengguna/edit_form/'.$ud['username']); ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
														<a href="<?= base_url('pengguna/hapus/'.$ud['username']); ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
                                        <?php endif;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->