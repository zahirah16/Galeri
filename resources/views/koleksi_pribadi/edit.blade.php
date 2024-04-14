@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('koleksi_pribadi').'/'.@$data->KategoriID }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @method('PUT')
          <div class="card-body">
            <h5 class="card-title">Edit Koleksi Pribadi</h5>
            <br>
             <div class="form-group row">
              <label class="col-sm-4 control-label col-form-label">Judul Buku</label>
              <div class="col-sm-8">
                <select class="form-control" name="BukuID">
                  <option value="">-- Pilih Buku --</option>
                  @if(@$buku != null)
                    @foreach($buku as $b)
                      <option {{ @$data->BukuID == $b->BukuID ? 'selected' : '' }} value="{{ $b->BukuID }}">{{ $b->Judul }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('koleksi_pribadi') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection