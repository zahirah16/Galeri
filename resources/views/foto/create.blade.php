@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('foto') }}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah Foto</h5>
            <br>
            <div class="form-group row mt-2">
              <label class="col-sm-3 text-end control-label col-form-label">Pilih File Foto</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="lokasi_file" required="required">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label class="col-sm-3 text-end control-label col-form-label">Judul Foto</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="judul_foto" required="required">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label class="col-sm-3 text-end control-label col-form-label">Deskripsi Foto</label>
              <div class="col-sm-9">
                <textarea name="deskripsi_foto" class="form-control" rows="3"></textarea>
              </div>
            </div>

            <div class="form-group row mt-2">
              <label class="col-sm-3 text-end control-label col-form-label">Album </label>
              <div class="col-sm-9">
                <select name="album" class="form-control" id="">
                  <option value="">-- pilih album --</option>
                  @if (@$album != null)
                      @foreach ($album as $item)
                          <option value="{{ @$item->id }}">{{ @$item->nama_album }}</option>
                      @endforeach
                  @endif
                </select>
              </div>
            </div>
            
           {{--  <div class="form-group row mt-2">
              <label class="col-sm-3 text-end control-label col-form-label">Gambar foto</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="Gambarfoto" required="required" accept="image/png, image/gif, image/jpeg">
              </div>
            </div> --}}
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('foto') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection