<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Penduduk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Exports\PendudukExport;
use Maatwebsite\Excel\Facades\Excel;

class InputController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'nik' => 'required|max:16|min:16',
            'no_kk' => 'required|max:16|min:16',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
        ]);

        $lastPendudukID = DB::table('penduduks')->select('id_penduduk')->orderBy('id_penduduk', 'desc')->first();
        if ($lastPendudukID == null) {
            $pendudukID = "PND001";
        } else {
            $lastIncrement = substr($lastPendudukID->id_penduduk, -3);
            $pendudukID = "PND" . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
        }

        $query = Penduduk::create([
            'id_penduduk' => $pendudukID,
            'id_user' => Auth::user()->id_user,
            'nik' => $request->get('nik'),
            'no_kk' => $request->get('no_kk'),
            'nama' => $request->get('nama'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'alamat' => $request->get('alamat'),
            'rt' => $request->get('rt'),
            'rw' => $request->get('rw'),
            'foto_ktp' => $request->file('foto_ktp')->store('foto-ktp'),
            'foto_kk' => $request->file('foto_kk')->store('foto-kk'),
            'status' => 'proses',
        ]);

        return redirect('/dashboard')->with('success', 'Berhasil Menginput Data');
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nik' => 'required|max:16|min:16',
            'no_kk' => 'required|max:16|min:16',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'foto_ktp' => 'image',
            'foto_kk' => 'image',
        ]);

        if ($request->file('foto_ktp')) {
            Storage::delete($request->get('oldKTP'));
            $validated['foto_ktp'] = $request->file('foto_ktp')->store('foto-ktp');
        } elseif ($request->file('foto_kk')) {
            Storage::delete($request->get('oldKK'));
            $validated['foto_kk'] = $request->file('foto_kk')->store('foto-kk');
        } elseif ($request->file('foto_ktp') && $request->file('foto_kk')) {
            Storage::delete($request->get('oldKTP'));
            Storage::delete($request->get('oldKK'));
            $validated['foto_ktp'] = $request->file('foto_ktp')->store('foto-ktp');
            $validated['foto_kk'] = $request->file('foto_kk')->store('foto-kk');
        }

        $query = Penduduk::where('id_penduduk', $id)->update($validated);

        return redirect('/dashboard')->with('success', 'Berhasil Mengubah Data');
    }

    public function verify(Request $request, $id){
        DB::table('penduduks')->where('id_penduduk', $id)->update([
            'status' => 'verified'
        ]);
        return redirect('/data-warga')->with('success', 'Data Berhasil Diverifikasi');
    }

    public function decline(Request $request, $id){
        DB::table('penduduks')->where('id_penduduk', $id)->update([
            'status' => 'declined'
        ]);
        return redirect('/data-warga')->with('success', 'Data Berhasil Ditolak');
    }

    public function destroy(Request $request, $id){
        User::where('id_user', $id)->delete();
        return redirect('/dashboard')->with('success', 'Berhasil Menghapus Data');
    }

    public function deleteWarga(Request $request, $id){
        Storage::delete($request->get('foto_ktp'));
        Storage::delete($request->get('foto_kk'));
        Penduduk::where('id_penduduk', $id)->delete();
        return redirect('/laporan')->with('success', 'Berhasil Menghapus Data');
    }

    public function exportPDF(){
        $data = Penduduk::all();

        $pdf = Pdf::loadView('admin.data-plain', ['data' => $data]);
        return $pdf->download('laporan-penduduk.pdf');
    }

    public function exportXLSX(){
        return Excel::download(new PendudukExport, 'laporan-penduduk.xlsx');
    }

    public function getFilter(Request $request){
        $filterRW = $request->get('filterRW') != '-' ? $request->get('filterRW') : '';
        $filterRT = $request->get('filterRT') != '-' ? $request->get('filterRT') : '';
        $query = DB::table('penduduks')->where('rt', 'LIKE', '%' . $filterRT . '%')->where('rw', 'LIKE', '%' . $filterRW . '%')->get();
        return response($query);
    }
}
