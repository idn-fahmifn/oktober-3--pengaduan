<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Tanggapan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // aturan untuk input judul dan dokumentasi.
        $request->validate([
            'judul_laporan' => 'required|max:50|string',
            'dokumentasi' => 'required|mimes:png,jpg,jpeg|max:5428'
        ]);

        // mendeklarasikan isi tanggal laporan
        $tanggal = Carbon::now()->format('y-m-d');
        $waktu = Carbon::now()->format('H:i:s');
        
        // meendeklarasikan isi dari tanggal dan waktu laporan sesuai dengan waktu laporan tersebut dibuat
        $input['tanggal_laporan'] = $tanggal;
        $input['jam_laporan'] = $waktu;

        // mengatur kondisi ketika ada input yang berisi file.
        if($request->hasFile('dokumentasi'))
        {
            $gambar = $request->file('dokumentasi');
            $extension = $gambar->getClientOriginalExtension();
            $path_simpan = 'public/images/dokumentasi-laporan';
            $nama_gambar = 'Dokumentasi-Laporan'.Carbon::now()->format('Ymd_his').'.'.$extension;
            $simpan = $request->file('dokumentasi')->storeAs($path_simpan, $nama_gambar);
            $input['dokumentasi'] = $nama_gambar;
        }

        // Simpan data di ke database.
        Laporan::create($input);
        return back()->with('success', 'Laporan berhasil dibuat, untuk meninjau progressnya selalu cek status laporan anda.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Laporan::find($id);
        $tanggapan = Tanggapan::where('id_laporan', $id)->get()->all();
        return view('laporan.detail', compact('data', 'tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }

}
