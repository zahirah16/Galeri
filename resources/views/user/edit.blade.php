@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('user').'/'.@$data->UserID }}" method="post">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit User</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="NamaLengkap" required="required" value="{{ @$data->NamaLengkap }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Email" required="required" value="{{ @$data->Email }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Alamat" required="required" value="{{ @$data->Alamat }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Username" required="required" value="{{ @$data->Username }}">
              </div>
            </div>

            

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="Password" class="form-control" name="password">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Level</label>
              <div class="col-sm-9">
                <select class="form-control" name="Level" required="required">
                  <option value="">-- Pilih User Level --</option>
                  <option {{ @$data->Level == 'Administrator' ? 'selected' : '' }} value="Administrator">Administrator</option>
                  <option {{ @$data->Level == 'Petugas' ? 'selected' : '' }} value="Petugas">Petugas</option>
                  <option {{ @$data->Level == 'Peminjam' ? 'selected' : '' }} value="Peminjam">Peminjam</option>
                </select>
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('user') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection