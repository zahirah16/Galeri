@extends('layout.app')
@section('konten')

  <div class="row">
    @if (@$semua_foto!=null)
        @foreach ($semua_foto as $item)
            <div class="col-md-3 mt-1">
              <img width="100%" src="{{ url($item->lokasi_file) }}" alt="">
              <br>
              <center>
                <b><i class="fa fa-heart"></i> : </b>
                <b style="margin-left: 10px"><i class="fa fa-comment"></i> : {{ @$item->komentar->count() }}</b>
              </center>
            </div>
        @endforeach
    @endif
  </div>
@endsection
