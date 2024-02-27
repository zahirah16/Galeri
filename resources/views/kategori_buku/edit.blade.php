@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('kategori_buku').'/'.@$data->KategoriID }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit kategori_buku</h5>
            <br>
             <div class="form-group row">
              <label class="col-sm-4 control-label col-form-label">Nama Kategori</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="NamaKategori" required="required" value="{{ @$data->NamaKategori }}">
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('kategori_buku') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection