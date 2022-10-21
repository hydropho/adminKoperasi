<!--**********************************
            Sidebar start
        ***********************************-->
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <img src="<?= base_url('assets/images/profile/') . $userdata['profil'] ?>" width="20" alt="">
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi, <b><?= $user['username'] ?></b></span>
                        <small class="text-end font-w400"><?= $user['nama_lengkap'] ?></small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="<?= base_url('pengguna/profile') ?>" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                            height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="<?= base_url('logout') ?>" class="dropdown-item ai-icon">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                            height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="ms-2">Logout </span>
                    </a>
                </div>
            </li>

            <?php
            $level = $this->session->userdata('level');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`, `icon`
									FROM `user_menu` JOIN `user_access_menu`
									ON `user_menu`.`id` = `user_access_menu`.`menu_id`
									WHERE `user_access_menu`.`role_id` = $level
									ORDER BY `user_access_menu`.`menu_id` ASC";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <?php foreach ($menu as $m) :

                if ($m['menu'] == 'Dashboard') : ?>
            <li>
                <?php if ($level == 2) : ?>
                <a href="<?= base_url('admin') ?>" class="ai-icon" aria-expanded="false">
                    <?php else : ?>
                    <a href="<?= base_url('user') ?>" class="ai-icon" aria-expanded="false">
                        <?php endif; ?>
                        <i class="<?= $m['icon'] ?>"></i>
                        <span class="nav-text"><?= $m['menu'] ?></span>
                    </a>
            </li>


            <?php elseif ($m['menu'] == 'Pengguna') : ?>
            <li>
                <a href="<?= base_url('pengguna') ?>" class="ai-icon" aria-expanded="false">
                    <i class="<?= $m['icon'] ?>"></i>
                    <span class="nav-text"><?= $m['menu'] ?></span>
                </a>
            </li>

            <?php elseif ($m['menu'] == 'Simulasi Pinjaman') : ?>
            <li>
                <a href="<?= base_url('simulasi') ?>" class="ai-icon" aria-expanded="false">
                    <i class="<?= $m['icon'] ?>"></i>
                    <span class="nav-text"><?= $m['menu'] ?></span>
                </a>
            </li>

            <?php elseif ($m['menu'] == 'SHU') : ?>
            <li>
                <a href="<?= base_url('shu') ?>" class="ai-icon" aria-expanded="false">
                    <i class="<?= $m['icon'] ?>"></i>
                    <span class="nav-text"><?= $m['menu'] ?></span>
                </a>
            </li>
            <?php elseif ($m['menu'] == 'Laporan') : ?>
            <li>
                <a href="<?= base_url('laporan') ?>" class="ai-icon" aria-expanded="false">
                    <i class="<?= $m['icon'] ?>"></i>
                    <span class="nav-text"><?= $m['menu'] ?></span>
                </a>
            </li>
            <?php elseif ($m['id'] == '5') : ?>
            <li>
                <a href="<?= base_url('simpanan/user') ?>" class="ai-icon" aria-expanded="false">
                    <i class="<?= $m['icon'] ?>"></i>
                    <span class="nav-text"><?= $m['menu'] ?></span>
                </a>
            </li>

            <?php else :
                    if ($title == $m['menu']) :
                    ?>
            <li class="mm-active">
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                    <?php else : ?>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <?php endif; ?>
                    <i class="<?= $m['icon'] ?>"></i>
                    <span class="nav-text"><?= $m['menu'] ?></span>
                </a>
                <ul aria-expanded="false">
                    <ul aria-expanded="false">
                        <?php
                                    $menuId = $m['id'];
                                    $querySubMenu = "SELECT * FROM `user_sub_menu`
										WHERE `menu_id` = $menuId
										ORDER BY `menu_id`		
						";

                                    $subMenu = $this->db->query($querySubMenu)->result_array();
                                    foreach ($subMenu as $sm) : ?>


                        <li><a href="<?= base_url($sm['url']) ?>"><?= $sm['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
            </li>
        </ul>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>

        </ul>
        <div class="copyright">
            <p><strong><?= $corp_name . ' ' . $status . ' ' . $sub_title ?></strong> © 2022 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> <?= $kelompok ?></p>
        </div>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->