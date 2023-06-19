
<?php include '../app/Views/page/header.php';

$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
// $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
$explode = str_replace("http://localhost:8081/absensi/", "",$url);

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
     
                    
            <?php
            // foreach($data_tech as $datas) :
                // if($tampung != '2'):
                    
                if($date_start->format('D') == $date_waktuSekarang) : ?>
            <?php if($dates_end_view <= $date_waktuSekarangs) : ?>
                <center><button type="button" class="btn btn-warning btn-rounded left mt-4">Sudah Selesai</button></center>
                <?php endif ; ?>
                <?php endif ; ?>
                <?php if($date_start->format('D') == $date_waktuSekarang) : ?>
                    <?php if($date_waktuSekarangs >= $dates_start_time) : ?>
                        <?php if($dates_end_view >= $date_waktuSekarangs) : ?>
                            <?php 
                            $sess= session()->get('user_id'); 

                $db      = \Config\Database::connect();
                // $builder = $db->table('users');
                    $builder = $db->table('absensis_teacher');
                    $builder->select('*');
                    $builder->orderBy('status', 'DESC');
                    $builder->where('user_id', $sess);
                    $builder->limit(1);
                    $builder->where('id_matkul', $explode);
                    $query = $builder->get();
                    // $builder->getFirstRow();
                    $dbb = $query->getResult();
                    
                 
                    // var_dump($dbb);


                               $tampung = '';
                               $tampung2 = '';

                               $tampung_id = '';

                            foreach($data_tech as $datas) :

                                $tampung =  $datas->statuss;
                                $tampung2 =  $datas->status_absen;

                                if(session()->get('user_id') ==  $datas->user_id):
                                    $tampung_id = 'true'
                                ?>
                            <?php endif ; ?>

                    <?php endforeach ; ?>

                        <?php  if($tampung2 != '1') : $sess= session()->get('user_id');  ?>
                            <form id="form_id">

                            <input type="hidden" name="user_id" value="<?=$sess ?>">
                            <input type="hidden" name="matkul_id" value="<?=$explode ?>"
                                <?php foreach($dbb as $db) : ?>

                                    <?php if($datas->status == '2') : ?>
                                    <?php if($db->statuss != '2') : ?>
                                        <center><button type="submit" class="btn btn-success btn-rounded SUBB left mt-4">Absen</button></center>         
                                        <?php endif ; ?>
                                        <?php endif ; ?>     
                                        
                                        <?php endforeach ;   
                                        ?>
                                        <?php if(!$dbb) : ?>
                                            <center><button type="submit" class="btn btn-success btn-rounded SUBB left mt-4">Absen</button></center>   
                                        <?php endif ; ?>
      

                            </form>
                    <?php endif ; ?>
                    <?php endif ; ?>
                    <?php endif ; ?>
                    <?php endif ; ?>
            <?php if($date_start->format('D') == $date_waktuSekarang) : ?>
                <?php if($date_waktuSekarangs < $dates_start_time) : ?>
                    <center><button type="button" class="btn btn-danger btn-rounded left mt-4">Belum Mulai</button></center>
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
                      <th>No</th>
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
                            $i = 1;
                            foreach($data_tech as $datas) :

                                // $tampung = $tampung + $datas->statuss;
                              
                            // var_dump(session()->get('user_id'), $datas->user_id);exit;
                            // foreach($datas as $tatas) :


                            // foreach($dataa as $dataa)  :
                                // var_dump($datas);exit;
                                // var_dump($datas->tgl_absen);exit;   

                                if(session()->get('user_id') ==  $datas->user_id):
                                    // echo "test";
                                    $date_startt = new DateTime($datas->tgl_absen)
                                    
                                    ?>
                                    <tr>
                                        
                                    <?php if($datas->status != '5') : ?>  <td class="sorting_1"><?= $i ?></td> <?php endif ; ?>
                                    <?php if($datas->status != '5') : ?>
                            <td>
                                <?php if($datas->status == '2') : ?>
                                    <?php if($datas->status != '5') : ?> <a href="javascript:void(0)" class="btn btn-primary">Hadir</a><?php endif ; ?>
                                <?php endif ; ?>
                                <?php if($datas->status != '2') : ?>
                                    <?php if($datas->status != '5') : ?><a href="javascript:void(0)" class="btn btn-secondary">Tidak Hadir</a><?php endif ; ?>
                                <?php endif ; ?>
                            </td>                                <?php endif ; ?>

                         <td><?= $date_startt->format('Y-m-d'); ?>
                         </td><td><?= $datas->jenis_matkul ?></td>
                         <td><?= $datas->meet_matkul ?></td>
                         <td><?= $datas->rangkuman ?></td>
                         <td><?= $datas->berita ?></td>
                        <!-- </tr> -->
                        <?php         if($datas == null):?>

                            <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No matching records found</td></tr>
                        <?php endif ; ?>
                    </tr>  <?php endif ; ?>
                    <?php $i++; endforeach ; ?>

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
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> -->


        <script>
            
            jQuery(document).ready(function($) {
                $('#myTable').DataTable();
            } );

            // $(".SUBB").click(function() {
            //             Cookies.set('RemoveCount', 'true');

            //         });
            $( "#form_id" ).submit(function( event ) {
                            $('#exampleModal').modal('hide')
                            event.preventDefault();
                            var form = $(this);
                            var actionUrl = 'http://localhost:8081/absensi_check'

                            $.ajax({
                                    type: "POST",
                                    url: actionUrl,
                                    data: form.serialize(), // serializes the form's elements.
                                    success: function(data)
                                    {

                                        Swal.fire({
                                position: 'center-center',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                                }).then(function(){
                                    location.reload();
                                    
                                    
                                })
                               

                            },
                            error: function (data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                },
                            });
                        });
                      

        </script>

