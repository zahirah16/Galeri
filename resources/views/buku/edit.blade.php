@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('buku').'/'.@$data->BukuID }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit buku</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Judul</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Judul" required="required" value="{{ @$data->Judul }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Penulis</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Penulis" required="required" value="{{ @$data->Penulis }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Penerbit</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Penerbit" required="required" value="{{ @$data->Penerbit }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Tahun Terbit</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="TahunTerbit" required="required" value="{{ @$data->TahunTerbit }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Kategori </label>
              <div class="col-sm-9">
                @if (@$kategori_buku!=null)
                  @foreach ($kategori_buku as $k)
                    <div class="form-check mb-1">
                        <input {{ in_array($k->KategoriID, $data_kategorinya) ? 'checked' : '' }} name="KategoriID[]" class="form-check-input" id="{{ @$k->NamaKategori }}" type="checkbox" value="{{ @$k->KategoriID }}">

                        <label class="form-check-label" for="{{ @$k->NamaKategori }}">{{ @$k->NamaKategori }}</label>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
            
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