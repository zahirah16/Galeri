@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('buku') }}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah Buku</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Judul</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Judul" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Penulis</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Penulis" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Penerbit</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Penerbit" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Tahun Terbit</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="TahunTerbit" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Kategori </label>
              <div class="col-sm-9">
                @if (@$kategori_buku!=null)
                  @foreach ($kategori_buku as $k)
                    <div class="form-check mb-1">
                        <input name="KategoriID[]" class="form-check-input" id="{{ @$k->NamaKategori }}" type="checkbox" value="{{ @$k->KategoriID }}">

                        <label class="form-check-label" for="{{ @$k->NamaKategori }}">{{ @$k->NamaKategori }}</label>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
            
           {{--  <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Gambar buku</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="Gambarbuku" required="required" accept="image/png, image/gif, image/jpeg">
              </div>
            </div> --}}
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('buku') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection