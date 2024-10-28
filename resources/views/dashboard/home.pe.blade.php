@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Selamat Datang</h2>
    <h3>{{ $data_rek }} | {{ $data_nama_lengkap }} ({{ $data_level }}), Di Aplikasi Pembayaran Tagihan Air.</h3>
    <hr/>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <b>Info Tagihan</b>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><b>Belum Bayar</b></td>
                                <td><b>: {{ $unpaidBills ?? '0' }} Bulan</b></td> <!-- Default to 0 if null -->
                            </tr>
                            <tr>
                                <td><b>Tagihan Lunas</b></td>
                                <td><b>: {{ $paidBills ?? '0' }} Bulan</b></td> <!-- Default to 0 if null -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <b>Info Layanan</b>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <h5><b>Administrator:</b></h5>
                                </td>
                            </tr>
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
    
    <hr/>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <b>Ketertiban Pembayaran Semua Pelanggan <span class="label label-danger">PENTING !</span></b>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID | Nama Plg</th>
                                    <th>Status</th>
                                    <th>Bulan - Tahun</th>
                                    <th>Tagihan</th>
                                    <th>Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentDetails as $index => $detail)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $detail->id_pelanggan }} - {{ $detail->nama_pelanggan }}</td>
                                    <td>
                                        @if ($detail->pel == 'Aktif')
                                            <span class="label label-success">Aktif</span>
                                        @else
                                            <span class="label label-warning">Non Aktif</span>
                                        @endif
                                    </td>
                                    <td>{{ $detail->nama_bulan }} - {{ $detail->tahun }}</td>
                                    <td>{{ number_format($detail->tagihan, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($detail->status == 'Belum Bayar')
                                            <span class="label label-danger">Belum Bayar</span>
                                        @else
                                            <span class="label label-primary">Lunas</span>
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
@endsection
