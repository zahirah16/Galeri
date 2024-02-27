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
          <h5 class="card-title">Data Kategori Buku</h5>
          <a href="{{ url('kategori_buku/create') }}" class="btn btn-primary">Tambah</a>
          <div class="table-responsive">
              <table class="table table-sniped" id="data-tabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
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
                        <td>{{ @$no++; }}</td>
                        <td>{{ @$d->NamaKategori; }}</td>
                        {{-- <td>
                          @if ($d->Gambarkategori_buku)
                            <img width="100" src="{{ asset('gambar_kategori_buku').'/'.@$d->Gambarkategori_buku }}">
                          @endif
                        </td> --}}
                        <td>
                          <a style="float: left;" href="{{ url('kategori_buku').'/'.@$d->KategoriID.'/edit' }}" class="btn btn-warning btn-sm">Edit</a>

                          <form id="theForm_{{ @$d->KategoriID }}" style="float: left; margin-left: 4px" method="POST" action="{{ url('/kategori_buku').'/'.$d->KategoriID }}">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}

                                  <div class="form-group">
                                      <input type="button" data-id="{{ @$d->KategoriID }}" class="btn btn-danger btn-sm hapus_btn" value="Hapus">
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
