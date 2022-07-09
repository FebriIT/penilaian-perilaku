<?php

namespace App\Exports;

use App\Models\SatyaLancana;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class SatyaLancanaExport implements FromCollection,WithHeadings,WithMapping,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SatyaLancana::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'NIP',
            'Gelar Depan',
            'Nama',
            'Gelar Belakang',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Pendidikan Terakhir',
            'No SK CPNS',
            'TMT CPNS',
            'Gol Ruang',
            'TMT Gol Ruang',
            'OPD',
            'Jabatan',
            'TMT Jabatan'

        ];
    }
    public function map($row): array
    {
        
        return[
            
            $row->id,
            "'".$row->nip,
            $row->gl_dpn,
            $row->nama,
            $row->gl_blk,
            $row->tempat_lahir,
            $row->tgl_lahir,
            $row->jk,
            $row->pendidikan_terakhir,
            $row->no_sk_cpns,
            $row->tmt_cpns,
            $row->gol_ruang,
            $row->tmt_gol_ruang,
            $row->opd->namaopd,
            $row->jabatan,
            $row->tmt_jabatan
        ];
    }
}
