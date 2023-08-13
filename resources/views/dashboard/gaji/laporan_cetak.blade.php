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
							<img src="" alt="logo-dkm" width="70" />
						</td>
						<td class="text-center" width="60%">
						<b>Kelurahan Piyaman</b> <br>
						Keluarahan Piyaman. Kapanewon Wonosari Kabpuraten Gunungkidul. Jl. Ki Demang Wonopawiro, Ngerboh, Piyaman. Piyamana<br>
						<td class="text-right" width="20%">
							<img src="" alt="logo-dkm" width="130" height="70"/>
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">LAPORAN DATA GAJI</h4>
			{{-- <h5 class="text-center">Periode <?php echo IndonesiaTgl($mulai) ." - ". IndonesiaTgl($selesai) ?></h5> --}}
			<br />
			<table class="table table-bordered table-keuangan">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pegawai</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Tunjangan</th>
						<th>Gaji Pokok</th>
						<th>Total Gaji</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($dataTable as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->nama_pegawai}}</td>
						<td>{{ $data->bulan}}</td>
						<td>{{ $data->tahun }}</td>
						<td>Rp.{{ number_format($data->tunjangan, 0, ',', '.')}}</td>
						<td>Rp.{{ number_format($data->gaji_pokok, 0, ',', '.')}}</td>
						<td>Rp.{{ number_format($data->total_gaji, 0, ',', '.')}}</td>
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