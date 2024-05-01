@extends('layout.app')
@section('konten')
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
        @if(session()->has('message'))
          <div class="alert alert-success">
            {{session()->get('message') }}
          </div>
      @endif
      @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error') }}
        </div>
      @endif
        <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Album</h5>
          <a href="{{ url('album/create') }}" class="btn btn-primary margin-top: 50px">Tambah</a>
          <div class="table-responsive">
              <table class="table table-sniped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Album</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Dibuat</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (@$data!=null)
                  @php
                    $no =1;
                  @endphp
                    @foreach ($data as $d)
                      <tr>
                        <td>{{ @$no++}}</td>
                        <td>{{ @$d->nama_album }}</td>
                        <td>{{ @$d->deskripsi }}</td>
                        <td>{{ tgl_indo_lengkap(@$d->tanggal_dibuat) }}</td>
                        <td>
                          <a style="float: left;" href="{{ url('album').'/'.@$d->id.'/edit' }}" class="btn btn-warning btn-sm">Edit</a>

                          <form id="theForm_{{ @$d->id }}" style="float: left; margin-left: 4px" method="POST" action="{{ url('/album').'/'.$d->id }}">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}

                                  <div class="form-group">
                                      <input type="button" data-id="{{ @$d->id }}" class="btn btn-danger btn-sm hapus_btn" value="Hapus">
                                  </div>
                              </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection
