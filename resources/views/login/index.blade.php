<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/x-icon" href="{{ asset('galeri.png') }}">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Galeri</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/fa.js') }}" crossorigin="anonymous"></script>
    </head>
    
        <body style="background-image: linear-gradient(90deg, rgb(65, 65, 147), grey)">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><img width="30px" src="{{ asset('galeri.png') }}"> Galeri</h3></div>
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
                                        <form action="{{ url('login-proses') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-floating mb-3">
                                                <input name="username" required="required" class="form-control" type="text" />
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" required="required" name="password" placeholder="Password" />
                                                <label>Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                {{-- <a class="small" href="password.html">Forgot Password?</a> --}}
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ url('register') }}">Belum punya akun ? Daftar Disini!</a></div>
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
