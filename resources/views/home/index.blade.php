@extends('layout.app')
@section('konten')

  <div class="row">
    @if (@$semua_foto!=null)
        @foreach ($semua_foto as $item)
            
            @php
              
              $jumlah_komentar = @jumlah_komentar($item->id);
              $jumlah_like = @jumlah_like($item->id);
            @endphp
            
            <div class="col-md-3 mt-3">
              <a title="Lihat Gambar" style="color: black; text-decoration: none; " href="{{ url('foto_detail/').'/'.$item->id.'/detail' }}">
              <img width="100%" src="{{ url($item->lokasi_file) }}" alt="">
              <br>
              <center style="font-size: 11px">
                <b><i class="fa fa-heart"></i> : {{ @$jumlah_like }}</b>
                <b style="margin-left: 10px"><i class="fa fa-comment"></i> : {{ @$jumlah_komentar }}</b>
                <br>
                <i class="fa fa-user"></i> : {{ @$item->user->nama_lengkap }}
                <br>
                <a href="{{ url('foto_detail/').'/'.$item->id.'/detail' }}">Lihat Gambar</a>
              </center>
              </a>

            </div>
        @endforeach
    @endif
  </div>
@endsection
