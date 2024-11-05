<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Laporan::all();
        return view('tanggapan.index', compact('data'));
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

        $laporan = Laporan::find($request->id_laporan);
        
        // mendeklarasikan isi tanggal laporan
        $tanggal = Carbon::now()->format('y-m-d');
        $waktu = Carbon::now()->format('H:i:s');

        Tanggapan::create([
            'id_laporan' => $request->id_laporan,
            'tanggal_ditanggapi' => $tanggal,
            'jam_ditanggapi' => $waktu,
            'tanggapan' => $request->tanggapan
        ]);
        // ubah status
        $laporan->status = $request->status;
        $laporan->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $data = Laporan::find($id);
        $tgp = Tanggapan::find('id_laporan');
        $tanggapan = Tanggapan::where('id_laporan', $id)->get()->all();
        return view('tanggapan.detail', compact('data','tanggapan', 'tgp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $tanggal = Carbon::now()->format('y-m-d');
        $waktu = Carbon::now()->format('H:i:s');
        $laporan = Laporan::find($request->id_laporan);

        $data = Tanggapan::find($id);
        $data->update([
            'id_laporan' => $request->id_laporan,
            'tanggal_ditanggapi' => $tanggal,
            'jam_ditanggapi' => $waktu,
            'tanggapan' => $request->tanggapan
        ]);

        // mengubah status jika ada perubahan
        $laporan->status = $request->status;
        $laporan->save();

        return back()->with('succeess', 'laporan sudah diupdate');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanggapan $tanggapan)
    {
        //
    }
}
