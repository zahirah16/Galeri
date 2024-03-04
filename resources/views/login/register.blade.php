<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/fa.js') }}" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark" style="background-image: url({{ url('bg.jpg')  }});height:100%;background-position: center; background-repeat: no-repeat;  background-size: cover;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h5 class="text-center font-weight-light my-1">Perpustakaan</h5>
                                       <small>Register</small> 
                                    </div>
                                    <div class="card-body">
                                        @if(session()->has('message'))
                                            <div class="alert alert-success">
                                              {{session()->get('message') }}
                                            </div>
                                        @endif
                                        @if(session()->has('error'))
                                          <div class="alert alert-danger">
                                              {{session()->get('error') }}
                                          </div>
                                        @endif
                                        <form action="{{ url('register-proses') }}" method="post">
                                            {{ csrf_field() }}
                                            
                                            <div class="form-group mb-1">
                                                <label>Nama Lengkap</label>
                                                <input name="NamaLengkap" required="required" class="form-control" type="text" />
                                            </div>

                                            <div class="form-group mb-1">
                                                <label>Email</label>
                                                <input name="Email" required="required" class="form-control" type="text" />
                                            </div>

                                            <div class="form-group mb-1">
                                                <label>Alamat</label>
                                                <input name="Alamat" required="required" class="form-control" type="text" />
                                            </div>

                                            <div class="form-group mb-1">
                                                <label>Username</label>
                                                <input name="Username" required="required" class="form-control" type="text" />
                                            </div>

                                            <div class="form-group mb-1">
                                                <label>Password</label>
                                                <input name="Password" required="required" class="form-control" type="Password" />
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-1 mb-0">
                                                {{-- <a class="small" href="password.html">Forgot Password?</a> --}}
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-2">
                                        <div class="small"><a href="{{ url('login') }}">Sudah punya akun ? Login Disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
{{--             <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> --}}
        </div>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
