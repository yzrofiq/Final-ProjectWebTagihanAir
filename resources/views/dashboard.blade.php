@extends('layouts.app')

@section('title', 'WaterClick')

@section('content')

<div id="wrapper">
    <header class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand"><i class="glyphicon glyphicon-leaf"></i> WaterClick</a>
        </div>
        <div class="user-welcome" style="color: white; padding: 15px 50px; float: right; font-size: 16px;">
            @if(session('ses_nama'))
                <span class="label label-danger">Welcome, {{ session('ses_nama') }} - {{ session('ses_level') }}</span>
            @endif
        </div>
    </header>

    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="{{ asset('assets/img/logobaru1.png') }}" class="user-image img-responsive" alt="Logo" />
                </li>

                <!-- Dynamic Menu Based on User Level -->
                @if(session('ses_level') == "Administrator")
                    <li><a href="{{ route('home_sa') }}"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
                    <li><a href="{{ route('pakai_tampil') }}"><i class="fa fa-refresh fa-2x"></i> Pemakaian</a></li>
                    <!-- More Administrator Menus -->
                @elseif(session('ses_level') == "Operator")
                    <li><a href="{{ route('home_op') }}"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
                    <li><a href="{{ route('pakai_tampil') }}"><i class="fa fa-refresh fa-2x"></i> Data Pemakaian</a></li>
                    <!-- More Operator Menus -->
                @elseif(session('ses_level') == "Pelanggan")
                    <li><a href="{{ route('home_pe') }}"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a></li>
                    <li>
                        <a href="#"><i class="fa fa-tags fa-2x"></i> Tagihan <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('tagih.tampil', ['status' => 'unpaid']) }}">Belum Bayar</a></li>
                            <li><a href="{{ route('tagih.tampil', ['status' => 'paid']) }}">Lunas</a></li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="{{ route('logout') }}" onclick="return confirm('Apakah anda yakin ingin keluar dari aplikasi ini ?')">
                        <i class="fa fa-sign-out fa-2x"></i> Keluar
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    @yield('dashboard_content')
                </div>
            </div>
        </div>
    </main>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush
