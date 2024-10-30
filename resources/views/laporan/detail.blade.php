@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body w-full p-4">

                    <h4 class="card-title">
                        Laporan saya
                    </h4>
                    <div class="d-flex justify-content-between mt-2 mb-2">
                        <p class="text-muted">Update laporan yang sudah diunggah</p>

                        <!-- untuk alert -->

                        @if ($data->status == 'pending')
                        <div class="alert alert-secondary bg-opacity-50">Status laporan anda : <b>pending</b> </div>

                        @elseif($data->status == 'diproses')
                        <div class="alert alert-info bg-opacity-50">Status laporan anda : <b>diproses</b> </div>

                        @elseif($data->status == 'selesai')
                        <div class="alert alert-success bg-opacity-50">Status laporan anda : <b>selesai</b> </div>

                        @else
                        <div class="alert alert-danger bg-opacity-50">Status laporan anda : <b>Laporan ditolak</b> </div>
                        @endif

                        <!-- end alert -->

                    </div>
                    <!-- tabel laporan user. -->
                    <div class="table-responsive">
                        <table class="table table-striped">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection