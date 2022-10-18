<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiAbsensiController extends Controller
{
    public function index()
    {
        $response=Http::withBasicAuth('absen','absen2022')->get('https://presensi.jambikota.go.id/api/Pegawai/?ABSEN-API-KEY=pkap');
        return $response->json();
        
    }
    public function create()
    {
        
        //proses check user from API
        $response=Http::withBasicAuth('absen','absen2022')->get('https://presensi.jambikota.go.id/api/Pegawai/?ABSEN-API-KEY=pkap')->json();
        // dd($response);
        // foreach($response as $data){
        //     $data2=array(
        //         'id'=>$data['userid'],
        //         'username'=>$data['nipbaru'],
        //         'name'=>$data['gldepan'].' '.$data['nama'].' '.$data['glblk'],
        //         'password'=>bcrypt($data['nipbaru']),
        //         'role'=>'user',
        //         'account_verified'=>'1'
        //     );
        // }
        // dd($data2->count());
        // User::insert($data2);


        $insert_data = [];

        foreach ($response as $data) {

            $data=array(
                'id'=>$data['userid'],
                'username'=>$data['nipbaru'],
                'name'=>$data['gldepan'].' '.$data['nama'].' '.$data['glblk'],
                'password'=>bcrypt($data['nipbaru']),
                'role'=>'user',
                'account_verified'=>'1'
            );

            $insert_data[] = $data;
        }

        $insert_data = collect($insert_data); // Make a collection to use the chunk method

        // it will chunk the dataset in smaller collections containing 500 values each. 
        // Play with the value to get best result
        $chunks = $insert_data->chunk(5000);

        
    }
}
