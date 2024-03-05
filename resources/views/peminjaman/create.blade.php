@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('peminjaman') }}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah Peminjaman</h5>
            <br>
          {{--   <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">User</label>
              <div class="col-sm-7">
                <select class="form-control" name="UserID" readonly="readonly" required="required">
                  <option value="">-- Pilih User --</option>
                @if ($user!=null)
                  
                  @foreach ($user as $u)
                    <option {{ session('UserID') == $u->UserID ? 'selected' : '' }} value="{{ @$u->UserID }}">{{ @$u->NamaLengkap }}</option>
                  @endforeach
                @endif
              </select>
              </div>
            </div> --}}

            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Buku</label>
              <div class="col-sm-7">
                 <select class="form-control" name="BukuID" required="required">
                  <option value="">-- Pilih Buku --</option>
                  @if ($buku!=null)
                  
                  @foreach ($buku as $b)
                    <option value="{{ @$b->BukuID }}">{{ @$b->Judul }} {{ rating(@$b->BukuID); }}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Tanggal Peminjaman</label>
              <div class="col-sm-7">
                <input type="date" class="form-control" name="TanggalPeminjaman" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Tanggal Pengembalian</label>
              <div class="col-sm-7">
                <input type="date" class="form-control" name="TanggalPengembalian">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Status Peminjaman</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="StatusPeminjaman">
              </div>
            </div>
            
           {{--  <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Gambar peminjaman</label>
              <div class="col-sm-7">
                <input type="file" class="form-control" name="Gambarpeminjaman" required="required" accept="image/png, image/gif, image/jpeg">
              </div>
            </div> --}}
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('peminjaman') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection