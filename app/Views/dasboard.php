
<?php include '../app/Views/page/header.php';
?>

	<body>
		<div class="page-wrapper pinned">
			<?php include '../app/Views/page/sidebar.php';?>
			<div class="page-content">
				<?php include '../app/Views/page/header_action.php';?>
				<?php include '../app/Views/page/page_header.php';?>
    <div class="main-container">
        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="">
                  
                                    <img src="/storage/profile-photos/QyzoG9dUvsY0cCmkeI2uvby29jc2ypC6GjNL49K0.jpg" class="img-thumbnail" alt="">
                                                   
                                    </div>
                                    <h5 class="user-name"></h5>
                                    <h6 class="user-email"></h6>
                                    <h6 class="user-email"></h6>
                                </div>
                                <div class="setting-links">
                                   
                                    
                                    <a href="/storage/Panduan MyBest Mahasiswa.pdf" target="_blank">
                                        <i class="icon-file-text"></i>
                                        Panduan Penggunaan 
                                    </a>
                                    
    
                                    <a href="/storage/PANDUAN_UJIAN_ONLINE_MHS_UBSI.pdf" target="_blank">
                                        <i class="icon-file"></i>
                                        Panduan Ujian Online 
                                    </a>
    
                                  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">

                    <?php $sess= session()->get('roles'); 
                 
                 if($sess == 'student' ) :?>
                 
                        <div class="card-header">
                            <div class="card-title">Profile Mahasiswa</div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                    <div class="form-group">
                                        <label for="fullName">NIM</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="<?= session()->get('nim'); ?>" name="nim" value="<?= session()->get('nim'); ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eMail">Nama</label>
                                        <input type="email" class="form-control" id="eMail" placeholder="<?= session()->get('name'); ?>" readonly="" name="name" value="<?= session()->get('name'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Email</label>
                                        <input type="text" class="form-control" id="phone" placeholder="<?= session()->get('email'); ?>" readonly="" name="email" value="<?= session()->get('email'); ?>">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="addRess">Kelas</label>
                                        <input type="text" class="form-control" id="addRess" placeholder="<?= session()->get('kelas'); ?>" value="<?= session()->get('kelas'); ?>" readonly="">
                                    </div>
                                  
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    
                                    <div class="text-right">
                                      
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ; ?>
                        <?php $sess= session()->get('roles'); 
                 
                        if($sess != 'student' ) :?>
                        <div class="card-header">
                            <div class="card-title">Profile Dosen</div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Kode Dosen</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="<?= session()->get('nim'); ?>" name="nim" value="<?= session()->get('nim'); ?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="eMail">Matakuliah</label>
                                        <input type="email" class="form-control" id="eMail" placeholder="<?= session()->get('name'); ?>" readonly="" name="name" value="<?= session()->get('name'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Email</label>
                                        <input type="text" class="form-control" id="phone" placeholder="<?= session()->get('email'); ?>" readonly="" name="email" value="<?= session()->get('email'); ?>">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="addRess">Kelas</label>
                                        <input type="text" class="form-control" id="addRess" placeholder="<?= session()->get('kelas'); ?>" value="<?= session()->get('kelas'); ?>" readonly="">
                                    </div>
                                  
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    
                                    <div class="text-right">
                                      
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ; ?>


                    </div>
                </div>
            </div>
    
            
    
        </div>
		<?php include '../app/Views/page/footer.php';?>