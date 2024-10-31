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
                        <a href="{{route('tanggapan.index')}}" class="btn text-muted">Kembali</a>

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
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">
                            Tanggapan Laporan
                        </h4>
                        
                        @if ($tanggapan)
                        <!-- jika laporannya sudah selesai -->
                            @foreach ($tanggapan as $item)
                                @if ($item->laporan->status == 'selesai')
                                    <span class="text-success">Laporan Selesai</span>
                                @else
                                <!-- jika laporan belum selesai -->
                                <button type="button" class="btn text-success" data-bs-toggle="modal" data-bs-target="#tanggapan">Edit</button>
                                @endif
                            @endforeach
                        <!-- jika laporannya masih pending -->
                        @else
                        <button type="button" class="btn text-success" data-bs-toggle="modal" data-bs-target="#tanggapan">Tanggapi</button>
                        @endif

                    </div>

                    @if ($tanggapan)
                      <p>Laporan sudah ditanggapi</p>
                    @else
                        <div class="alert alert-warning mt-4">
                            <span class="fw-bold">Yaah</span> Laporan ini belum ditanggapi.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<!-- show model tanggapan -->
<div class="modal fade" id="tanggapan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tanggapi Laporan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('tanggapan.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mt-2">
                        <input type="text" name="id_laporan" value="{{$data->id}}" hidden>
                        <div class="col-md-12">
                            <select name="status" class="form-control" required>
                                <option value="">-Pilih Status-</option>
                                <option value="diproses">diproses</option>
                                <option value="selesai">selesai</option>
                                <option value="ditolak">ditolak</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="text-muted">Tanggapan</label>
                            <textarea name="tanggapan" class="form-control text-muted"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tanggapi</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection