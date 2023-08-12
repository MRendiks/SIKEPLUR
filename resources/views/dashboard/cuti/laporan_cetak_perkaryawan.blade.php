<!doctype html>
<html lang="en">
<head>
    <title>template</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<style type="text/css">
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 10mm;
        margin: 5mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        border: 2px white solid;
        height: 257mm;
        outline: 5mm white solid;
    }
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body>
    <script>
        window.onload = function() {
            window.print();
        };
</script>
<div class="book">
<div class="page">
<div class="subpage">
    <div class="container-fluid">
		<b style="margin-top: 20px ">
			<div style="text-align: center; font-size: 30px;line-height: 30px; margin-top: 10px">
			   LAPORAN DATA CUTI
		   </div>
	   </b>
	   <hr color="black"style="line-height: 5px"> 
	   <hr width="100%" color="black"><p>
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
	</div>
</div>
</div>
</div>
</body>
</html>