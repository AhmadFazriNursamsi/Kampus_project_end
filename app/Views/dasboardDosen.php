
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->


<?php include '../app/Views/page/header.php';
?>

	<body>
		<div class="page-wrapper pinned">
			<?php include '../app/Views/page/sidebar dosen.php';?>
			<div class="page-content">
				<?php include '../app/Views/page/header_action.php';?>
				<?php include '../app/Views/page/page_header.php';?>
                <div class="main-container">
             

				
             <div class="row gutters">
                 <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                     <div class="info-tiles">
                  
                            <center> <button type="button" class="btn btn-primary btn-rounded left mt-4" data-bs-toggle="modal" id="cscs" data-bs-target="#exampleModal">
                    Add Absen
                    </button></center>
                     </div>
                     <!-- Button trigger modal -->
                   

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mulai Absensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="add_abs"  >
              <?= csrf_field(); ?>
                <div class="mb-3">
                <select id="cars" name="meet" class="form-control">
                    <?php $i = 1;
                    
                    while($i <= 16) :
                        
                        ?>
                <option value="<?=$i?>">Pertemuan <?= $i ?></option>
           
                <?php $i++; endwhile ; ?>
                
                </select>
            
                </div>
                <div class="mb-3">
                <div class="form-floating">
  <textarea class="form-control" name="rangkuman" placeholder="Rangkuman here" id="floatingTextarea"></textarea>
</div>
                </div>
                <div class="mb-3">
                <div class="form-floating">
  <textarea class="form-control" name="berita" placeholder=" Berita here" id="floatingTextarea"></textarea>
</div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="cscs">Save changes</button>
            </div>
        </div>
    </div>
</form>
                    </div>
                 </div>

                 <div class="modal fade" id="student_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Status Absensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="modal-badan">
                        </div>
                        <table id="table_student" class="table custom-table">
                             <thead>
                                 <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Nim</th>
                                   <th>Kelas</th>
                                   <th>Pertemuan</th>
                                   <th>Status Hadir</th>

                                 </tr>
                             </thead>
                             <tbody class="bodyy">
                           
                             </tbody>
                        </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="cscs">Save changes</button>
            </div>
        </div>
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
                                   <!-- <th>Status Absen</th> -->
                                   <th>Tanggal</th>
                                   <th>Matakuliah</th>
                                   <th>Pertemuan</th>
                                   <th>Rangkuman</th>
                                   <th>Berita Acara</th>
                                   <th>Action</th>

                                 </tr>
                             </thead>
                             <tbody>


                                 <?php 
                                 $i = 1;
                                 $db      = \Config\Database::connect();
                                 $builder = $db->table('class');
                                 $builder->select('*');
                         
                                 $builder->where('flag', '1');
                                 $querys = $builder->get();
                         
                                 $dbb =$querys->getResult();
                                //  var_dump($dbb);exit;
                                //  foreach($querys->getResult() as $queryy ){

                                //  }
                                 foreach($absen as $absen) : 
                                 
                                    $date_startt = new DateTime($absen['tgl_absen'])
                                    
                                    ?>
                                 <tr>
                                     
                                     
                                     <!-- <td>1</td> -->
                                     <td><?= $i ?></td>
                                     <td><?= $date_startt->format('Y-m-d'); ?></td>
                                     <td><?= $absen['jenis_matkul'] ?></td>
                                     <td><?= $absen['meet_matkul'] ?></td>
                                     <td><?= $absen['rangkuman'] ?></td>
                                     <td><?= $absen['berita'] ?></td>
                                     <td class="d-flex d-inline">
                                    <button type="button" class="btn btn-sm btn-info" onclick="studentShow(<?= $absen['id']?>)" data-bs-toggle="modal" style="margin-right: 3px;" id="cscs" data-bs-target="#student_view"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                    </button>
                                    <?php if(!$dbb) : ?>
                                    <button class="btn btn-sm btn-danger " disabled style="margin-right: 3px;" onclick="studentLock(<?= $absen['id']?>)" ><i class="fa fa-lock"></i></i></button> 
                                    <?php endif ; ?>
                                    <?php if($dbb) : ?>
                                    <button class="btn btn-sm btn-danger " style="margin-right: 3px;" onclick="studentLock(<?= $absen['id']?>)" ><i class="fa fa-lock"></i></i></button> 
                                    <?php endif ; ?>
                                    <!-- <a href="#" class="btn btn-sm btn-primary "><i class="fa-sharp fa-solid fa-eye"></i></a> -->
                                    </td>

                                    </tr>

                                    <?php
                                    $i++;
                                    endforeach ; ?>
             
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
                     <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
                     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                     <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
             
             
                     <script>
                         
                         jQuery(document).ready(function($) {
                             $('#myTable').DataTable();

                            //  setInterval( function () {
                            //     table.ajax.reload( null, false ); // user paging is not reset on reload
                            // }, 30000 );
                            
                        });
                            $( "#add_abs" ).submit(function( event ) {
                            $('#exampleModal').modal('hide')
                            event.preventDefault();
                            var form = $(this);
                            var actionUrl = 'http://localhost:8081/dasboard_admin'

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

                            function studentShow(id) { 

                                console.log(id);
                                

                                var actionUrl = 'http://localhost:8081/student-show/' + id

                                $.ajax({
                                    type: "GET",
                                    url: actionUrl,
                                    // data: form.serialize(), // serializes the form's elements.
                                    success: function(data)
                                    {
                                        
                                        $('.boddy').html("");
                            var i =1 
                                            $.each(data.data, function(x,y){
                                                console.log(x,y);
                                                if(y.status == 2){
                                                    var button = '<span class="btn btn-success btn-sm"> Hadir</i></span>';
                                                }
                                                else{
                                                    var button = '<span class="btn btn-danger btn-sm"> Tidak Hadir</i></span>';

                                                }
                                                $('.bodyy').append(
                                                    '<tr>'+
                                                    '<td>'+i+'</td>'+
                                                    '<td>'+y.full_name+'</td>'+
                                                    '<td>'+y.nim+'</td>'+
                                                    '<td>'+y.kelas+'</td>'+
                                                    '<td>'+y.meet_matkul+'</td>'+
                                                    '<td>'+button+'</td>'+
                                                    '</tr>'
                                                )
                                                i++
                                               })
                                               $('#table_student').DataTable().draw();
                                            //    location.reload()
                                        },error: function (data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                },
                                    });
                             }
                             $('#student_view').on('hidden.bs.modal', function () {
                                location.reload();
                                })
                        function studentLock(id) { 
                            var actionUrl = 'http://localhost:8081/student-lock/' + id
                            Swal.fire({
                            title: 'Yakin akan tutup absen ini ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, Tutup Absen!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                type: "GET",
                                url: actionUrl,
                                success: function(data)
                                {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    html:'Kamu Berhasil Menutup <b>Absen!</b>'
                                }).then(function(){ 
                                        location.reload();
                                        })

                                }
                            });
                            } else {
                                $('#deletevbtn').show();
                            }
                        })
                        }
                             
                     </script>
             
             