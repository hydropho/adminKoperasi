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
                            <?= $this->session->flashdata('alert_message')?>
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
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 

                                            foreach ($queryUserdata as $ud) :
                                                if ($ud['level'] == 1) : 
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
                                                <?php if ($ud['aktif'] == 2) : ?>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal<?= $ud['username']?>"><span class="badge light badge-success">Aktif</span></a>
                                                <?php elseif ($ud['aktif'] == 1) : ?>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal<?= $ud['username']?>"><span class="badge light badge-warning">Pending</span></a>
                                                <?php else :?>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal<?= $ud['username']?>"><span class="badge light badge-danger">Belum Aktif</span></a>
                                                <?php endif;?>
                                                </td>
                                                <td>
													<div class="d-flex">
														<a href="<?= base_url('pengguna/edit_form/'.$ud['username']); ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
														<a href="<?= base_url('pengguna/hapus/'.$ud['username']); ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>												
                                            </tr>
                                            <div class="bootstrap-modal">
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal<?= $ud['username']?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ubah Status</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Ubah status untuk mengaktifkan user yang sedang mendaftar.</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
                                                            <?php if ($ud['aktif'] == 2) : ?>
                                                            <a href="<?= base_url('pengguna/nonaktif/').$ud['username']; ?>"><button type="button" class="btn btn-sm btn-primary">Nonaktifkan</button></a>
                                                            <?php elseif ($user['aktif'] == 1) : ?>
                                                            <a href="<?= base_url('pengguna/aktif/').$ud['username']; ?>" ><button type="button" class="btn btn-sm btn-primary">Aktifkan</button></a>
                                                            <?php endif ;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        <!--**********************************
            Content body end
        ***********************************-->