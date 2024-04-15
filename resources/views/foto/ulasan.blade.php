@extends('layout.app')
@section('konten')

  <div class="row">
   <div class="col-md-7">
      <div class="card">
        
          <div class="card-body">
            <center>
              <a style="margin-top: 4px" href="{{ url('/home') }}" class="btn btn-sm btn-warning"> <i class="fa fa-backward"></i> Kembali</a>  
              <h5>{{ @$data->judul_foto }}</h5>
            </center>
            <img width="100%" src="{{ url(@$data->lokasi_file) }}" alt="">
            <center>
              <b><i class="fa fa-heart"></i> : {{ jumlah_like(@$data->id) }}</b>
              <b style="margin-left: 10px"><i class="fa fa-comment"></i> : {{ @count(@$komentar) }}</b>
            </center>
            <table style="font-size: 11px;" width="" class="" cellpadding="2px">
              <tr>
                <th>User</th>
                <td>:</td>
                <td>{{ @$data->user->nama_lengkap }}</td>
              </tr>

              <tr>
                <th>Deskripsi</th>
                <td>:</td>
                <td>{{ @$data->deskripsi_foto }}</td>
              </tr>

              <tr>
                <th>Tanggal Unggah</th>
                <td>:</td>
                <td>{{ tgl_indo_lengkap(@$data->tanggal_unggah) }}</td>
              </tr>

              <tr>
                <th>Album</th>
                <td>:</td>
                <td><span class="bg-info">{{ @$data->album->nama_album }}</span></td>
              </tr>
            </table>
          </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="card">
        <form class="form-horizontal" action="{{ url('foto').'/'.@$data->id.'/like_post' }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group row">
              <div class="col-sm-5">
                <b>Suka dengan foto ini ?</b>
              </div>
              <div class="col-sm-5">
                @if ($sudah_like!=null)
                  <i>Anda telah menyukai foto ini</i>
                  <input type="hidden" value="2" name="tipe">
                  <button class="btn btn-warning"> <i class="fa fa-heart"></i> Batal Suka</button>
                @else    
                  <input type="hidden" value="1" name="tipe">
                  <button class="btn btn-danger"> <i class="fa fa-heart"></i> Sukai Foto</button>
                @endif
                </div>
            </div>
          </div>
        </form>
      </div>
      <br>
      <div class="card">
        <form class="form-horizontal" action="{{ url('foto').'/'.@$data->id.'/komentar_post' }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group row">
              {{-- <label class="col-sm-3 text-end control-label col-form-label">Komentar Anda</label> --}}
              <div class="col-sm-10">
                <textarea class="form-control" placeholder="Komentar Anda ..." name="komentar" rows="1" required="required"></textarea>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-sm btn-primary">
                  Submit
                </button>
                <br>
                
              </div>
            </div>
          </div>
        </form>
      </div>
      <br>
      <div class="card">
        
        <div class="card-body">
          {{-- <h5 class="card-title">Daftar Komentar</h5> --}}
          <b>Daftar Komentar</b>
          @if(@$komentar!=null)
            @php
              $no=1;
            @endphp
           

              @foreach(@$komentar as $u)
                <div style="width: 100%; padding: 4px;">
                  <p>
                    <b><i class="fa fa-user"></i> : {{ @$u->user->nama_lengkap }}</b>
                    <br>
                    <b><i class="fa fa-comment"></i></b> : " <i>{{ @$u->isi_komentar }}</i> ".
                    <br>
                    <b><i class="fa fa-clock"></i></b> : {{ @tgl_indo_lengkap(@$u->tanggal_komentar) }}
                      @if(@$u->user_id == session('UserID'))
                          <form id="theForm_{{ @$u->id }}" style="margin-left: 4px" method="POST" action="{{ url('/komentar').'/'.$u->id.'/hapus_komentar' }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <div class="form-group">
                                        <input type="button" data-id="{{ @$u->id }}" class="btn btn-danger btn-sm hapus_btn" value="Hapus Komentar">
                                    </div>
                                </form>
                        @endif
                  </p>
                </div>
              @endforeach
          @endif
        </div>
    </div>


    </div>
  </div> 
  <br>
  <div class="row">
    <div class="col-md-12">
      
    </div>
  </div>
@endsection