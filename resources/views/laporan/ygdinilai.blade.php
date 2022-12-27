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
            <h3><center><u> LAPORAN PENILAIAN PERILAKU PEGAWAI <br>
                OPD : {{ $unker->nunker }} <br>
                 TAHUN 2022 </u></center></h3>
            <table style="width: 100%;text-align: center;" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama yang Dinilai</th>
                        {{--  <th>Nama Penilai</th>
                        <th>Skor</th>  --}}
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $key=>$row)
                    
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>@if($row->gldepan!=null){{ $row->gldepan }}. @endif{{ $row->nama }}@if($row->glblk!=null), {{ $row->glblk }} @endif<br> NIP. {{ $row->nipbaru }}</td>
                            @php
                                $namapenilai=App\Models\JawabanPenilai::where('nip_ygdinilai',$row->nipbaru)->get();
                                $countpenilai=App\Models\JawabanPenilai::where('nip_ygdinilai',$row->nipbaru)->sum('hasil');
                                $jumlahpenilai=App\Models\JawabanPenilai::where('nip_ygdinilai',$row->nipbaru)->count();
                                if($jumlahpenilai!=null){

                                    $fnilai=number_format($countpenilai/$jumlahpenilai,0);
                                }else{
                                    $fnilai=0;
                                }
                                

                                @endphp
                            @if($countpenilai==0)

                                <td colspan="3" bgcolor="red">Belum ada penilaian</td>
                            @else
                                {{--  <td>
                                    @foreach ($namapenilai as $key=>$row1)
                                        @php
                                            $dNama=App\Models\User2::where('nipbaru',$row1->nip_penilai)->first();
                                        @endphp
                                        {{ ++$key }}. @if($dNama->gldepan!=null){{ $dNama->gldepan }}. @endif{{ $dNama->nama }}@if($dNama->glblk!=null), {{ $dNama->glblk }} @endif <br>

                                    @endforeach
                                </td>  --}}
                                {{--  <td>{{ $fnilai }}</td>  --}}
                                <td>@if($fnilai<=25)<b style="color:red">Kurang Dari Ekspetasi</b>  @elseif($fnilai<=49) <b style="color:green">Sesuai Ekspetasi </b> @elseif ($fnilai<=63) <b style="color:blue;">  Melebihi Ekspetasi </b> @else Data Tidak Ditemukan @endif </td>
                             @endif
                           
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <br>
            <table style="width: 100%;text-align: center;border-style: none;">
                {{--  <tr>
                    <td>
                        Mengetahui, <br>
                    Kepala Sekolah <br>
                    <br><br><br>
                    ADE ERMA SURYANI <br>
                    NIP. 19680618 199102 2 001
                    </td>
                    <td>
                        Jambi, asa <br>
                    Kepala Perpustakaan <br>
                    <br><br><br><br>
                    KUNTI DEWI HAMBAWANI <br>
                    NIP. 19791103 200801 2 002
                    </td>
                </tr>  --}}
                {{-- <tr>
                    <td>Baris 2 kolom 1</td>
                    <td>baris 2 kolom 2</td>
                </tr> --}}
            </table>
        </div>
    </div>


</body>

</html>
