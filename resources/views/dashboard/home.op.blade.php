@extends('layouts.app') <!-- Assuming you have a layout file called app.blade.php -->

@section('content')
<div class="container">
    <h2>Selamat Datang</h2>
    <h3>{{ $data_nama_lengkap }} ({{ $data_level }}), Di Aplikasi Pembayaran Tagihan Air.</h3>
    <hr/>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b>Info Layanan</b>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Informasi</th> <!-- Adding a header for the information column -->
                        </tr>
                    </thead>
                    <tbody>
                        <h5>
                            <b>&nbsp;Administrator:</b>
                        </h5>
                        @foreach($serviceInfo as $info)
                        <tr>
                            <td>{{ $info->isi_info }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
