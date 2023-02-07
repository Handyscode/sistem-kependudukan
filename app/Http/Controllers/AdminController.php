<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class AdminController extends Controller
{
    public function dashboard(){
        $penduduks = Penduduk::paginate(10);
        return view('admin.dashboard', compact('penduduks'));
    }
}
