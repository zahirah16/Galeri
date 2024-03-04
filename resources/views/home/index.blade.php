@extends('layout.app')
@section('konten')

            <div class="row">
              <div class="col-md-3">
                
                <div class="card bg-primary text-white">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ @$buku }}</h3>
                          {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="font-weight-normal">Buku</h6>
                  </div>
                </div>
                <br>
                <div class="card bg-warning text-white">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ @$user }}</h3>
                          {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> --}}
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="font-weight-normal">User / Pengguna</h6>
                  </div>
                </div>

                <br>
                <div class="card bg-success text-white">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{ @$peminjaman }}</h3>
                          {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> --}}
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="font-weight-normal">Transaksi Peminjaman</h6>
                  </div>
                </div>

              </div>

              <div class="col-md-5">
                <div class="card">
                  <div class="card-body">
                    <p><small>Selamat datang</small> <b>{{ user()->NamaLengkap }}</b></p>
                    <p>Silahkan menikmati berbagai fitur di aplikasi ini</p>
                  </div>
                </div>
              </div>
             
              {{-- <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$12.34</h3>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Daily Income</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$31.53</h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                  </div>
                </div>
              </div> --}}
            </div>
@endsection
