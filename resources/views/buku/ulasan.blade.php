@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-6">
      <div class="card">
        
          <div class="card-body">
            <h5 class="card-title">Rating buku</h5>
            <center>
                <h2>{{ rating(@$data->BukuID); }}</h2>
            </center>

            <table width="100%" class="table table-sniped">
              <tr>
                <th>Judul Buku</th>
                <td>:</td>
                <td>{{ @$data->Judul }}</td>
              </tr>

              <tr>
                <th>Penulis</th>
                <td>:</td>
                <td>{{ @$data->Penulis }}</td>
              </tr>

              <tr>
                <th>Penerbit</th>
                <td>:</td>
                <td>{{ @$data->Penerbit }}</td>
              </tr>

              <tr>
                <th>Tahun Terbit</th>
                <td>:</td>
                <td>{{ @$data->TahunTerbit }}</td>
              </tr>

              <tr>
                <th>Kategori</th>
                <td>:</td>
                <td>{{ kategori_buku(@$data->BukuID); }}</td>
              </tr>
            </table>
          </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('buku').'/'.@$data->BukuID.'/ulasan_post' }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Berikan Ulasan</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Ulasan</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="Ulasan" required="required"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Rating</label>
              <div class="col-sm-9">
                <input type="number" min="1" max="5" class="form-control" name="Rating" required="required">
              </div>
            </div>

           
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url()->previous() }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        
          <div class="card-body">
            <h5 class="card-title">Daftar Ulasan Buku</h5>
            @if(@$ulasan!=null)
              @php
                $no=1;
              @endphp
              <table class="table table-sniped">
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Rating</th>
                  <th>Ulasan</th>
                  <th></th>
                </tr>

                @foreach(@$ulasan as $u)
                  <tr>
                    <td>{{ @$no++ }}</td>
                    <td>{{ @$u->user->NamaLengkap }}</td>
                    <td>{{ @$u->Rating }}</td>
                    <td>{{ @$u->Ulasan }}</td>
                    <td>
                      @if(@$u->UserID == session('UserID'))
                        <form id="theForm_{{ @$u->UlasanID }}" style="float: left; margin-left: 4px" method="POST" action="{{ url('/ulasan').'/'.$u->UlasanID.'/hapus_ulasan' }}">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}

                                  <div class="form-group">
                                      <input type="button" data-id="{{ @$u->UlasanID }}" class="btn btn-danger btn-sm hapus_btn" value="Hapus">
                                  </div>
                              </form>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </table>
            @endif
    </div>
  </div>
@endsection