<nav id="sidebar" class="sidebar-wrapper">
				
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
                <div class="sidebar-content">
    <!-- sidebar menu start -->
    <div class="sidebar-menu">
        <ul>
            <li class="header-menu">Menu</li>
            <li class="sidebar">
                <a href="<?= base_url() . 'dasboard'?>">
                    <i class="fa fa-home"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
                    </a>	
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="menu-text">Profil</span>
                </a>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span class="menu-text">Jadwal </span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="<?= base_url() . 'matkul'?>">Jadwal Kuliah</a>
                        </li>
                        <li>
                            <a href="#">Kuliah Pengganti</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="sidebar">
                <a href="http://elearning.bsi.ac.id/logout">
                    <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i><span class="menu-text">Logout</span>
                </a>
            </li>
           
        </ul>
    </div>
    <!-- sidebar menu end -->
</div>				<!-- Sidebar content end -->
			</nav>