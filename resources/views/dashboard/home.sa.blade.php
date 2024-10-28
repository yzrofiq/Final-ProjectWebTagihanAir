@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Selamat Datang</h2>
    <h3>{{ $data_nama_lengkap }} ({{ $data_level }}), Di Aplikasi Pembayaran Tagihan Air.</h3>
    <hr/>

    <div class="row">
        <!-- Active and Inactive Customers -->
        <div class="col-md-6 col-sm-6 col-xs-12"> <!-- Adjusted for better mobile layout -->
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-users"></i>
                </span>
                <p class="main-text">Data Pelanggan</p>
                <br>
                <hr/>
                <div class="text-box">
                    <p class="main-text">{{ $activeCustomers ?? 0 }} Pelanggan Aktif</p> <!-- Default to 0 if null -->
                    <h5><b><a href="{{ route('pelanggan.tampil') }}">Selengkapnya</a></b></h5>
                </div>
                <div class="text-box">
                    <p class="main-text">{{ $inactiveCustomers ?? 0 }} Pelanggan Non Aktif</p> <!-- Default to 0 if null -->
                    <h5><b><a href="{{ route('pelanggan.tampil') }}">Selengkapnya</a></b></h5>
                </div>
            </div>
        </div>

        <!-- Unpaid and Paid Bills -->
        <div class="col-md-6 col-sm-6 col-xs-12"> <!-- Adjusted for better mobile layout -->
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-tags"></i>
                </span>
                <p class="main-text">Data Tagihan</p>
                <br>
                <hr/>
                <div class="text-box">
                    <p class="main-text">{{ $unpaidBills ?? 0 }} Tagihan Belum Bayar</p> <!-- Default to 0 if null -->
                    <h5><b><a href="{{ route('tagih.tampil') }}">Selengkapnya</a></b></h5>
                </div>
                <div class="text-box">
                    <p class="main-text">{{ $paidBills ?? 0 }} Tagihan Lunas</p> <!-- Default to 0 if null -->
                    <h5><b><a href="{{ route('lunas.tampil') }}">Selengkapnya</a></b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
