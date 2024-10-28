<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | WaterClick</title>
    <link rel="icon" href="{{ asset('assets/img/logobaru1.png') }}">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body style="background-color: lightblue;">
    <div class="container">
        <header class="row text-center mb-4">
            <div class="col-md-12">
                <br><br><br>
                <img src="{{ asset('assets/img/tirto.png') }}" width="250px" alt="WaterClick Logo" />
                <br><br>
            </div>
        </header>
        <main class="row">
            <div class="col-md-4 offset-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h5><b>WaterClick</b></h5>
                    </div>
                    <div class="panel-body">
                        @if(session('success'))
                            <script>
                                Swal.fire('Success', '{{ session('success') }}', 'success');
                            </script>
                        @endif
                        @if($errors->any())
                            <script>
                                Swal.fire('Error', 'Login Gagal. Please check your customer ID.', 'error');
                            </script>
                        @endif
                        <form action="{{ route('customer.login') }}" method="POST">
                            @csrf
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Masukkan ID Pelanggan" name="no_rek" required autofocus aria-label="ID Pelanggan">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
