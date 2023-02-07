<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class ApiController extends Controller
{
    public function data(){
        return datatables(Penduduk::select('nik', 'no_kk', 'nama', 'jenis_kelamin', 'alamat', 'rt', 'rw', 'foto_ktp', 'foto_kk'))->toJson();
    }
}
