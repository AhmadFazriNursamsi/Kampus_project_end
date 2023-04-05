
<?php include '../app/Views/page/header.php';
?>

	<body>
		<div class="page-wrapper pinned">
			<?php include '../app/Views/page/sidebar.php';?>
			<div class="page-content">
				<?php include '../app/Views/page/header_action.php';?>
				<?php include '../app/Views/page/page_header.php';?>
				<div class="main-container">
				
<div class="row gutters">
    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-4">
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-account_circle"></i>
            </div>
            <div class="stats-detail">
                <h3>AZB</h3>
                <p>Dosen</p>
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-home2"></i>
            </div>
            <div class="stats-detail">
                <h3>404-E2</h3>
                <p>Ruang</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-documents"></i>
            </div>
            <div class="stats-detail">
                <h5>WEBPROGRAMMINGII</h5>
                <p>Matakuliah</p>
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-layers"></i>
            </div>
            <div class="stats-detail">
                <h5>KG.682.05.A</h5>
                <p>Kelas</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-4">
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-watch_later"></i>
            </div>
            <div class="stats-detail">
                <h5>12:40</h5>
                <p>Jam Masuk</p>
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-date_range"></i>
            </div>
            <div class="stats-detail">
                <h5>Senin</h5>
                <p>Hari</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-4">
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-clock1"></i>
            </div>
            <div class="stats-detail">
                <h5>16:00</h5>
                <p>Jam Keluar</p>
                
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
                <i class="icon-dribbble-with-circle"></i>
            </div>
            <div class="stats-detail">
                <h5>682</h5>
                <p>Kode MTK</p>
                
            </div>
        </div>
    </div>
   
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="info-tiles">
            
                           
                                    <center><button type="button" class="btn btn-danger btn-rounded left mt-4">Belum Mulai</button></center>
                    </div>
    </div>
       

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
    <!-- Row start -->
    <div class="row gutters mt-3 mb-5">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    </div>
    <!-- Row end -->
    <div class="table-container">
        <div class="t-header">Rekap Absen</div>
        <div class="table-responsive">
            
            <table id="myTable" class="table custom-table">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Status Absen</th>
                      <th>Tanggal</th>
                      <th>Matakuliah</th>
                      <th>Pertemuan</th>
                      <th>Rangkuman</th>
                      <th>Berita Acara</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <tr role="row" class="odd"><td class="sorting_1">1</td><td><a href="javascript:void(0)" class="btn btn-primary">Hadir</a></td><td>2023-03-13</td><td>WEB PROGRAMMING II</td><td>1</td><td>Suasana pembejalaran kondusif dan dari 48 mahasiswa yang hadir 47 mahasiswa</td><td>Bahan Kajian:
                            1.Penjelasan mengenai tugas final project, pembagian kelompok, kontrak perkuliahan, Pengenalan dan konfigurasi Git, Pengenalan framework web dan kelebihannya, Pengertian codeigniter instalasi codeigniter
                            
                            Rangkuman Materi:
                            Menjelaskan Tentang Awal Perkuliahan, kontrak perkuliahan, tugas project yang harus dikerjakan dan aspek penilaian  mata kuliah, mampu menerapkan perintah Git, mampu mengartikan dan menjelaskan konsep framework Codeigniter terkait: framework web, codeigniter, definsi, instalasi, kelebihan/keuntungan</td></tr>
                    </tr>
                </tbody>
        </table>
        </div>
    </div>
   
				</div>
				
				<!-- Main container end -->

			</div>
			<!-- Page content end -->

		</div>
        <?php include '../app/Views/page/footer.php';?>