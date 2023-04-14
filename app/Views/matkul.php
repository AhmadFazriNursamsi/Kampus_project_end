
<?php include '../app/Views/page/header.php';
?>

	<body>
		<div class="page-wrapper pinned">
			<?php include '../app/Views/page/sidebar.php';?>
			<div class="page-content">
				<?php include '../app/Views/page/header_action.php';?>
				<?php include '../app/Views/page/page_header.php';?>
				<div class="main-container">
					<div class="content-wrapper">
    					<div class="row gutters">
							<?php include '../app/Views/page/logic_time.php';?>
							<?php 
								foreach($dbbb as $data) : 
									$date_start = new DateTime($data['tgl_matkul']);
									$date_end = new DateTime($data['tgl_matkul_end']);
									$dates_start_view = format_hari_tanggal($date_start->format('D H:i:s'));
									$dates_end_view = jam($date_end->format('D H:i:s'));?>
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="pricing-plan">
										<div class="pricing-header <?php if($date_start->format('D') == $date_waktuSekarang) {echo ""; } else {echo "secondary";}  ?> ">
											<h6 class="pricing-title"><?= $data['jenis_matkul'] ?></h6>
											<div class="pricing-save"><?= $dates_start_view ?> - <?= $dates_end_view ?></div>
										</div>
										<div class="card-body">
											<h5 class="styled"><i class=" fa fa-user"></i> Kode Dosen : <?= $data['kd_dosen'] ?></h5>
											<h5 class="styled"><i class="fa-solid fa-book-open-reader"></i> Kode MTK : <?= $data['kd_mtk'] ?></h5>
											<h5 class="styled"><i class="fa-solid fa-ticket"></i> SKS : <?= $data['sks'] ?></h5>
											<h5 class="styled"><i class="fa-sharp fa-solid fa-map-pin"></i> No Ruang : <?= $data['no_ruang'] ?></h5>

											<h5 class="styled text-muted"><i class="fa-solid fa-users"></i> Kel Praktek : </h5>
											<h5 class="styled text-muted"><i class="fa-solid fa-bookmark"></i> Kode Gabung : </h5>
										</div>
										<div class="pricing-footer">
											<div class="btn-group" role="group" aria-label="Basic example">
																					
												<!-- <a href="<?// ini lanjut bsok cari bedasarkan id= base_url() . 'absensi/'.$data['id'].'' ?>" class="btn btn-primary btn-lg contoh">Masuk Kelas</a> -->

												<a href="<?= base_url() . 'absensi/' . $data['id'] ?>" class="btn btn-primary btn-lg contoh">Masuk Kelas</a>

												<a href="http://elearning.bsi.ac.id/form-diskusimhs/eyJpdiI6Im5yZWF2R1Q2d3gra1dUYmdNTW1nU3c9PSIsInZhbHVlIjoidlJWUnppMXhoWWU5dis1bml1NEVhUT09IiwibWFjIjoiOTA2NzQ1ODVlNGQ2YmNiOTI4OTRkYzVmNmI3NWE0MzVlM2UzZDVkODIxZDIxY2ZmN2ZlNzQxZTk4NTU3MGQ1ZCJ9" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Ruang Diskusi">
													<i class="fa fa-message"></i>
												</a>
												<a href="http://elearning.bsi.ac.id/learning/eyJpdiI6Im5yZWF2R1Q2d3gra1dUYmdNTW1nU3c9PSIsInZhbHVlIjoidlJWUnppMXhoWWU5dis1bml1NEVhUT09IiwibWFjIjoiOTA2NzQ1ODVlNGQ2YmNiOTI4OTRkYzVmNmI3NWE0MzVlM2UzZDVkODIxZDIxY2ZmN2ZlNzQxZTk4NTU3MGQ1ZCJ9" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Ruang Materi">
													<i class="fa fa-archive"></i>
												</a>
												<a href="http://elearning.bsi.ac.id/assignment/eyJpdiI6Im5yZWF2R1Q2d3gra1dUYmdNTW1nU3c9PSIsInZhbHVlIjoidlJWUnppMXhoWWU5dis1bml1NEVhUT09IiwibWFjIjoiOTA2NzQ1ODVlNGQ2YmNiOTI4OTRkYzVmNmI3NWE0MzVlM2UzZDVkODIxZDIxY2ZmN2ZlNzQxZTk4NTU3MGQ1ZCJ9" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Ruang Tugas">
													<i class="fa fa-archive"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach ; ?>
    					</div>
					</div>
				</div>
			</div>
		</div>

		<?php include '../app/Views/page/footer.php';?>
