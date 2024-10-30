<?php

namespace App\Http\Controllers;

use App\Models\Laporan;

use Illuminate\Http\Request;

class PelaporController extends Controller
{
    public function index()
    {
        // $data = Laporan::all();
        $laporan_saya = Laporan::where('id_user', auth()->user()->id)->get()->all();
        return view('pengaduan', compact( 'laporan_saya'));
        
    }
}
