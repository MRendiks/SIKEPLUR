<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Cetak</title>

	<link href="libs/images/logo.jpg" rel="icon" type="images/x-icon">


	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<!-- <link href="dist/css/offline-font.css" rel="stylesheet"> -->
	<link href="dist/css/custom-report.css" rel="stylesheet">

	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="text-left" width="20%">
							{{-- <img src="libs/images/logo.jpg" alt="logo-dkm" width="70" /> --}}
						</td>
						<td class="text-center" width="60%">
							<b>Kelurahan Piyaman</b> <br>
							Keluarahan Piyaman. Kapanewon Wonosari Kabpuraten Gunungkidul. Jl. Ki Demang Wonopawiro, Ngerboh, Piyaman. Piyamana<br>
						<td class="text-right" width="20%">
							{{-- <img src="libs/images/logo.jpg" alt="logo-dkm" width="130" height="70"/> --}}
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">LAPORAN DATA CUTI</h4>
			<br />
			<table class="table table-bordered table-keuangan">
				<thead>
					<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama Pegawai</th>
						<th>Jabatan</th>
						<th>Jenis Cuti</th>
						<th>Tanggal Cuti</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Akhir</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data_cuti as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->nik }}</td>
						<td>{{ $data->nama_pegawai }}</td>
						<td>{{ $data->jabatan }}</td>
						<td>{{ $data->jenis_cuti}}</td>
						<td>{{ $data->jumlah_hari_cuti }} Hari</td>
						<td>{{ $data->tanggal_mulai}}</td>
						<td>{{ $data->tanggal_akhir}}</td>
						<td>{{ $data->status}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<br />
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>