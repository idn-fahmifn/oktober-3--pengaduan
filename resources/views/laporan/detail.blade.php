@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body w-full p-4">
                    
                    <!-- area judul dan button -->
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">
                            {{$data->judul_laporan}}
                        </h4>
                        <a href="{{route('home')}}" class="btn text-muted">Kembali</a>
                        
                    </div>
                    <!-- end areanya -->

                    <div class="d-flex justify-content-between mt-4 mb-2">
                        <p class="text-muted"><b>Nama Pelapor : </b>{{$data->user->name}}</p>

                        <!-- untuk alert -->
                        @if ($data->status == 'pending')
                        <div class="text-secondary bg-opacity-50">Status laporan anda : <b>pending</b> </div>

                        @elseif($data->status == 'diproses')
                        <div class="text-info bg-opacity-50">Status laporan anda : <b>diproses</b> </div>

                        @elseif($data->status == 'selesai')
                        <div class="text-success bg-opacity-50">Status laporan anda : <b>selesai</b> </div>

                        @else
                        <div class="text-danger bg-opacity-50">Status laporan anda : <b>Laporan ditolak</b> </div>
                        @endif
                        <!-- end alert -->
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- tabel laporan user. -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Judul laporan</th>
                                            <td>{{$data->judul_laporan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>{{$data->kategori}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Laporan</th>
                                            <td>{{$data->tanggal_laporan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Laporan</th>
                                            <td>{{$data->jam_laporan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Judul laporan</th>
                                            <td>{{$data->deskripsi}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- area image -->
                        <div class="col-md-6">
                            <img src="{{asset('storage/images/dokumentasi-laporan/'.$data->dokumentasi)}}" alt="Dokumentasi Laporan" width="300" class="img-fluid">
                        </div>
                        <!-- end area image -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Tanggapan Laporan
                    </h4>
                    <div class="alert alert-warning mt-4">
                        <span class="fw-bold">Yaah</span> laporan anda belum ditanggapi, mohon menunggu.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection