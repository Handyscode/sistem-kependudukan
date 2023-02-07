<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RT;
use App\Models\RW;

class PagesController extends Controller
{
    public function index(){
        return view('login');
    }

    public function registrasi(){
        return view('registrasi');
    }

    public function dashboard(){
        $penduduks = Penduduk::orderBy('created_at', 'DESC')->get();
        if (Auth::user()->role == 'admin') {
            $pendLaki = Penduduk::where('jenis_kelamin', 'L')->count();
            $pendPerem = Penduduk::where('jenis_kelamin', 'P')->count();
            $pendVerif = Penduduk::where('status', 'verified')->count();
            $pendProses = Penduduk::where('status', 'proses')->count();
            $pendTolak = Penduduk::where('status', 'declined')->count();
            return view('admin/dashboard', compact('penduduks', 'pendLaki', 'pendPerem', 'pendVerif', 'pendProses', 'pendTolak'));
        }else{
            return view('dashboard', compact('penduduks'));
        }
    }

    public function create(){
        return view('input-data');
    }

    public function edit($id){
        $penduduks = Penduduk::where('id_penduduk', $id)->first();
        return view('edit-data', compact('penduduks'));
    }

    public function dataWarga(){
        $penduduks = Penduduk::orderBy('created_at', 'DESC')->get();
        $rts = RT::all();
        $rws = RW::all();
        return view('admin/data-warga', compact('penduduks', 'rts', 'rws'));
    }
    
    public function laporan(Request $request){
        if ($request->ajax()) {
            $filterRW = $request->get('rw') != '-' ? $request->get('rw') : '';
            $filterRT = $request->get('rt') != '-' ? $request->get('rt') : '';
            $penduduks = Penduduk::where('rt', 'like', '%' . $filterRT . '%')->where('rw', 'like', '%' . $filterRW . '%')->orderBy('created_at', 'DESC')->get();
        }else{
            $penduduks = Penduduk::orderBy('created_at', 'DESC')->get();
        }
        $rts = RT::all();
        $rws = RW::all();
        return view('admin/laporan', compact('penduduks', 'rts', 'rws'));
    }

    public function dataUser(){
        $users = User::all();
        return view('admin/data-user', compact('users'));
    }
}
