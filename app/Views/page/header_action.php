<header class="header">
    <div class="toggle-btns">
        <a id="toggle-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
        <a id="pin-sidebar" href="#">
            <i class="fa fa-list"></i>
        </a>
    </div>
    <div class="header-items">
       

        <!-- Header actions start -->
        <ul class="header-actions">
          
        <!-- <h1>Hai !</h1> -->

       
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name"> <?= session()->get('nim'); ?></span>
                    <span class="avatar"><i class="fa fa-user"></i><span class="status busy"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                         
                        </div>
                        <a href="#"><i class="icon-user1"></i> My Profile</a>

                        <a href="<?= base_url() . 'logout' ?>">
                            <i class="icon-log-out1"></i><span class="menu-text">Logout</span>
                        </a>
                        
                        
                        
                    </div>
                </div>
            </li>
        </ul>						
        <!-- Header actions end -->
    </div>
</header>	