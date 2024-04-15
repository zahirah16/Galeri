@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
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
        
      <div class="card">
        
        
        <form class="form-horizontal" action="{{ url('profil_saya').'/'.@$data->id }}" method="post">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Profil Anda</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama lengkap</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_lengkap" required="required" value="{{ @$data->nama_lengkap }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="email" required="required" value="{{ @$data->email }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="alamat" required="required" value="{{ @$data->alamat }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Username" required="required" value="{{ @$data->username }}">
              </div>
            </div>

            

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Password Baru</label>
              <div class="col-sm-9">
                <input type="Password" class="form-control" name="Password">
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Simpan Profil
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection