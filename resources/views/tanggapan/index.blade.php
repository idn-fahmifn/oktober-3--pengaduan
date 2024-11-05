@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body w-full p-4">
                    <!-- alert success -->
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Yeay!</strong> {{session('success')}}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- End alert -->
                    <h4 class="card-title">
                        Data semua laporan
                    </h4>
                    
                    <!-- tabel laporan user. -->
                    <div class="table-responsive">
                        <table class="table table-striped" id="example">
                            <thead>
                                <th>Judul Laporan</th>
                                <th>Tanggal Laporan</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <!-- looping data nya untuk menampilkan semua data yang ada di tabel laporan. -->
                                @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0 text-muted" href="{{route('tanggapan.show', $item->id)}}">{{$item->judul_laporan}}</a>
                                    </td>
                                    <td>{{$item->tanggal_laporan}}</td>
                                    <td>
                                        <!-- jika statusnya pending, akan mengeluarkan notif berwarna abu -->
                                        @if ($item->status == 'pending')
                                        <span class="badge text-bg-secondary bg-opacity-50">pending</span>

                                        @elseif($item->status == 'diproses')
                                        <span class="badge text-bg-info bg-opacity-50">diproses</span>

                                        @elseif($item->status == 'selesai')
                                        <span class="badge text-bg-success bg-opacity-50">selesai</span>

                                        @else
                                        <span class="badge text-bg-danger bg-opacity-50">Laporan ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buat laporan baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('laporan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                                <input type="text" value="{{Auth::user()->id}}" name="id_user" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="judul_laporan" required class="form-control" placeholder="Judul laporan">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="kategori" class="form-control text-muted" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Kerusakan">Kerusakan</option>
                                    <option value="Kehilangan">Kehilangan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" name="dokumentasi" class="form-control" placeholder="Dokumentasi" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label>Deskripsi laporan</label>
                            <textarea name="deskripsi" class="form-control text-muted"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Laporkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection