<?php
									function format_hari_tanggal($waktu){
										$hari_array = array(
											'Minggu',
											'Senin',
											'Selasa',
											'Rabu',
											'Kamis',
											'Jumat',
											'Sabtu');
										$hr = date('w', strtotime($waktu));
										$hari = $hari_array[$hr];
										$tanggal = date('j', strtotime($waktu));
										$bulan_array = array(
											1 => 'Januari',
											2 => 'Februari',
											3 => 'Maret',
											4 => 'April',
											5 => 'Mei',
											6 => 'Juni',
											7 => 'Juli',
											8 => 'Agustus',
											9 => 'September',
											10 => 'Oktober',
											11 => 'November',
											12 => 'Desember',);
										$bl = date('n', strtotime($waktu));
										$bulan = $bulan_array[$bl];
										$tahun = date('Y', strtotime($waktu));
										$jam = date( 'H:i', strtotime($waktu));
										return "$hari - $jam";
									}
									function format_hari($waktu){
										$hari_array = array(
											'Minggu',
											'Senin',
											'Selasa',
											'Rabu',
											'Kamis',
											'Jumat',
											'Sabtu');
										$hr = date('w', strtotime($waktu));
										$hari = $hari_array[$hr];
										$tanggal = date('j', strtotime($waktu));
										$bulan_array = array(
											1 => 'Januari',
											2 => 'Februari',
											3 => 'Maret',
											4 => 'April',
											5 => 'Mei',
											6 => 'Juni',
											7 => 'Juli',
											8 => 'Agustus',
											9 => 'September',
											10 => 'Oktober',
											11 => 'November',
											12 => 'Desember',);
										$bl = date('n', strtotime($waktu));
										$bulan = $bulan_array[$bl];
										$tahun = date('Y', strtotime($waktu));
										$jam = date( 'H:i', strtotime($waktu));
										return "$hari";
									}
									function jam($waktu){
										$hari_array = array(
											'Minggu',
											'Senin',
											'Selasa',
											'Rabu',
											'Kamis',
											'Jumat',
											'Sabtu'
										);
										$hr = date('w', strtotime($waktu));
										$hari = $hari_array[$hr];
										$tanggal = date('j', strtotime($waktu));
										$bulan_array = array(
											1 => 'Januari',
											2 => 'Februari',
											3 => 'Maret',
											4 => 'April',
											5 => 'Mei',
											6 => 'Juni',
											7 => 'Juli',
											8 => 'Agustus',
											9 => 'September',
											10 => 'Oktober',
											11 => 'November',
											12 => 'Desember',
										);
										$bl = date('n', strtotime($waktu));
										$bulan = $bulan_array[$bl];
										$tahun = date('Y', strtotime($waktu));
										$jam = date( 'H:i', strtotime($waktu));
										return "$jam";
									}
                                    $date_waktuSekarang = date('D', strtotime('+7 hours')); 
									$date_waktuSekarangs = date('H:i', strtotime('+7 hours')); 

								
									?>