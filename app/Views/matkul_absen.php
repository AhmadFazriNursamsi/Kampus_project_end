
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
                <i class="fa fa-user"></i>
            </div>
            <?php include '../app/Views/page/logic_time.php';?>
            <?php 

// var_dump($data);exit;
foreach($data as $data) :
                $date_start = new DateTime($data['tgl_matkul']);
                $date_end = new DateTime($data['tgl_matkul_end']);
                $dates_start_view = format_hari($date_start->format('D '));
                $dates_start_time = jam($date_start->format('D H:i:s'));

                $dates_end_view = jam($date_end->format('D H:i:s'));?>
            
            <div class="stats-detail">
                <h3><?= $data['kd_dosen'] ?></h3>
                <p>Dosen</p>
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
                <i class="fa fa-home"></i>
            </div>
            <div class="stats-detail">
                <h3><?= $data['no_ruang'] ?></h3>
                <p>Ruang</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
        <div class="info-tiles">
            <div class="info-icon">
                <i class="fa fa-paste"></i>
            </div>
            <div class="stats-detail">
                <h5><?= $data['jenis_matkul'] ?></h5>
                <p>Matakuliah</p>
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
                <i class="fa fa-layer-group"></i>
            </div>
            <div class="stats-detail">
                <h5><?= $data['no_ruang'] ?></h5>
                <p>Kelas</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-4">
        <div class="info-tiles">
            <div class="info-icon">
            <i class="fa-solid fa-clock"></i>
                    </div>
            <div class="stats-detail">
                <h5><?= $dates_start_time ?></h5>
                <p>Jam Masuk</p>
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
                <i class="fa fa-calendar"></i>
            </div>
            <div class="stats-detail">
                <h5><?= $dates_start_view ?></h5>
                <p>Hari</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-4">
        <div class="info-tiles">
            <div class="info-icon">
                <i class="fa fa-clock"></i>
            </div>
            <div class="stats-detail">
                <h5><?= $dates_end_view ?></h5>
                <p>Jam Keluar</p>
                
            </div>
        </div>
        <div class="info-tiles">
            <div class="info-icon">
            <i class="fa-brands fa-dribbble"></i>
        </div>
        <div class="stats-detail">
            <h5><?= $data['kd_mtk'] ?></h5>
            <p>Kode MTK</p>
            
        </div>
        </div>
        <?php endforeach ; ?>
    </div>
   
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="info-tiles">
        <?php if($date_start->format('D') == $date_waktuSekarang) : ?>
            <?php if($dates_end_view <= $date_waktuSekarangs) : ?>
            <center><button type="button" class="btn btn-warning btn-rounded left mt-4">Sudah Selesai</button></center>
            <?php endif ; ?>
            <?php endif ; ?>
            <?php if($date_start->format('D') == $date_waktuSekarang) : ?>
            <?php if($dates_end_view > $date_waktuSekarangs) : ?>
            <center><button type="button" class="btn btn-success btn-rounded left mt-4">Absen</button></center>
            <?php endif ; ?>
            <?php endif ; ?>
            <?php if($date_start->format('D') != $date_waktuSekarang) : ?>
            <center><button type="button" class="btn btn-danger btn-rounded left mt-4">Belum Mulai</button></center>
            <?php endif ; ?>
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
                    <?php
                        // if(session()->get('nim');
                        ?>
                        <!-- <tr role="row" class="odd"> -->
                            <?php 
                            foreach($data_tech as $datas) :
                              
                            // var_dump(session()->get('user_id'), $datas->user_id);exit;
                            // foreach($datas as $tatas) :

                            // foreach($dataa as $dataa)  :
                                // var_dump($tatas->tgl_absen);exit;
                                // var_dump($datas->tgl_absen);exit;   
                                if(session()->get('user_id') ==  $datas->user_id):
                                    // echo "test";
                                    $date_startt = new DateTime($datas->tgl_absen)
                                    
                                    ?>
                                      <?php if($datas->status_hadir != '5') : ?> 
                                    <tr>
                                        
                                    <?php if($datas->status != '5') : ?>  <td class="sorting_1">1</td> <?php endif ; ?>
                                    <?php if($datas->status != '5') : ?>
                            <td>
                                <?php if($datas->status == '2') : ?>
                                    <?php if($datas->status != '5') : ?> <a href="javascript:void(0)" class="btn btn-primary">Hadir</a><?php endif ; ?>
                                <?php endif ; ?>
                                <?php if($datas->status != '2') : ?>
                                    <?php if($datas->status != '5') : ?><a href="javascript:void(0)" class="btn btn-secondary">Tidak Hadir</a><?php endif ; ?>
                                <?php endif ; ?>
                            </td>                                <?php endif ; ?>

                         <?php if($datas->status_hadir != '5') : ?> <td><?= $date_startt->format('Y-m-d'); ?><?php endif ; ?>
                         <?php if($datas->status_hadir != '5') : ?> </td><td><?= $datas->jenis_matkul ?></td><?php endif ; ?>
                         <?php if($datas->status_hadir != '5') : ?> <td><?= $datas->meet_matkul ?></td><?php endif ; ?>
                         <?php if($datas->status_hadir != '5') : ?> <td><?= $datas->rangkuman ?></td><?php endif ; ?>
                         <?php if($datas->status_hadir != '5') : ?> <td><?= $datas->berita ?></td><?php endif ; ?>
                        <!-- </tr> -->
                        <?php endif ;         if($datas == null):?>

                            <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No matching records found</td></tr>
                        <?php endif ; ?>
                    </tr>  <?php endif ; ?>
                    <?php endforeach ; ?>

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
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


        <script>
            
            jQuery(document).ready(function($) {
                $('#myTable').DataTable();
            } );
        </script>

