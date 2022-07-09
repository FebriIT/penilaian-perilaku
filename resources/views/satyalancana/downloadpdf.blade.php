<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

    </style>

</head>

<body>

    <div class="container">
        <div>
            <h3><center>Laporan Satyalancana Karya Satya <br> Periode {{ $periode->title }}</center></h3>
            <table style="width: 100%;text-align: center;" border="1">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>NIP</td>
                        <td>Gelar Depan</td>
                        <td>Nama</td>
                        <td>Gelar Belakang</td>
                        <td>Tempat Lahir</td>
                        <td>Tanggal Lahir</td>
                        <td>Jenis Kelamin</td>
                        <td>Pendidikan Terakhir</td>
                        <td>No SK CPNS</td>
                        <td>TMT CPNS</td>
                        <td>Gol Ruang</td>
                        <td>TMT Gol Ruang</td>
                        <td>OPD</td>
                        <td>Jabatan</td>
                        <td>TMT Jabata</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $key=>$row)
                    <tr>
                        <td>{{ $row->id }}</td> 
                        <td>{{ $row->nip }}</td> 
                        <td>{{ $row->gl_dpn }}</td> 
                        <td>{{ $row->nama }}</td> 
                        <td>{{ $row->gl_blk }}</td> 
                        <td>{{ $row->tempat_lahir }}</td> 
                        <td>{{ $row->tgl_lahir }}</td> 
                        <td>{{ $row->jk }}</td> 
                        <td>{{ $row->pendidikan_terakhir }}</td> 
                        <td>{{ $row->no_sk_cpns }}</td> 
                        <td>{{ $row->tmt_cpns }}</td> 
                        <td>{{ $row->gol_ruang }}</td> 
                        <td>{{ $row->tmt_gol_ruang }}</td> 
                        <td>{{ $row->opd->namaopd }}</td> 
                        <td>{{ $row->jabatan }}</td> 
                        <td>{{ $row->tmt_jabatan }}</td>                 
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <br>
            
        </div>
    </div>


</body>

</html>
