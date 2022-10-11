<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li class="dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="<?= base_url('assets/images/profile/default.jpg')?>" width="20" alt="">
							<div class="header-info ms-3">
								<span class="font-w600 ">Hi, <b><?= $user['username']?></b></span>
								<small class="text-end font-w400"><?= $user['nama_lengkap']?></small>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="app-profile.html" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ms-2">Profile </span>
							</a>
							<a href="auth/logout" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ms-2">Logout </span>
							</a>
						</div>
					</li>

                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-086-star"></i>
							<span class="nav-text">Laporan</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ui-accordion.html">Bukti Bayar</a></li>
                            <li><a href="ui-alert.html">Cetak Laporan</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">User</span>
						</a>
                        <ul aria-expanded="false">
                                <ul aria-expanded="false">
                                    <li><a href="email-compose.html">Pengurus</a></li>
                                    <li><a href="email-inbox.html">Anggota</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text">Simpanan</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="chart-flot.html">Data Simpanan</a></li>
                            <li><a href="chart-morris.html">Jenis Simpanan</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-086-star"></i>
							<span class="nav-text">Pinjaman</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ui-accordion.html">Tambah Pinjaman Baru</a></li>
                            <li><a href="ui-alert.html">Data Pinjaman</a></li>
                            <li><a href="ui-badge.html">Tagihan Pinjaman</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-045-heart"></i>
							<span class="nav-text">SHU</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="uc-select2.html">Pembagian SHU</a></li>
                        </ul>
                    </li>

                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-013-checkmark"></i>
							<span class="nav-text">Simulasi Pinjaman</span>
						</a>
					</li>

                </ul>
				<div class="copyright">
					<p><strong>Kotree Admin Dashboard</strong> © 2022 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by Kelompok 3</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        