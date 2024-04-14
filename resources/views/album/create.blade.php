@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('album') }}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah Album</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-4 control-label col-form-label">Nama Album</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_album" required="required">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label class="col-sm-4 control-label col-form-label">Deskripsi</label>
              <div class="col-sm-8">
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>  
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('album') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection