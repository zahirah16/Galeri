@extends('layout.app')
@section('konten')
  <style type="text/css">
    select option{
      font-size: 14px;
    }
    input[type="date"]
      {
          font-size:12px;
      }
      .control-label {
        font-size: 12px;
      }
  </style>
  <div class="row">
    <div class="col-md-12">
      
      <div class="card">
        <div class="row">
          <div class="col-md-4">
          <form class="form-horizontal" action="{{ url('laporan') }}" enctype="multipart/form-data" method="get">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Laporan Peminjaman</h5>
            <br>

            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Dari Tanggal</label>
              <div class="col-sm-7">
                <input type="date" class="form-control" name="dari_tanggal" required="required" value="{{ @$_GET['dari_tanggal'] }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Sampai Tanggal</label>
              <div class="col-sm-7">
                <input type="date" class="form-control" name="sampai_tanggal" required="required" value="{{ @$_GET['sampai_tanggal'] }}">
              </div>
            </div>
{{-- 
            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">User</label>
              <div class="col-sm-7">
                <select style="font-size: 12px;" class="form-control" name="UserID" required="required">
                  <optgroup>
                  <option value="">-- Pilih User --</option>
                @if ($user!=null)
                  
                  @foreach ($user as $u)
                    <option value="{{ @$u->UserID }}">{{ @$u->NamaLengkap }}</option>
                  @endforeach
                @endif
              </optgroup>
              </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 text-end control-label col-form-label">Buku</label>
              <div class="col-sm-7">
                 <select style="font-size: 12px;" class="form-control" name="BukuID">
                  <option value="">-- Pilih Buku --</option>
                  @if ($buku!=null)
                  
                  @foreach ($buku as $b)
                    <option value="{{ @$b->BukuID }}">{{ @$b->Judul }}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>

           --}}  
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" style="font-size: 12px;" class="btn btn-sm btn-primary">
                Tampilkan Laporan
              </button>
            </div>
          </div>
          </form>
        </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            @if (@$data!=null)
              <center>
                <h5>Laporan Peminjaman Buku</h5>
                <p>Periode : {{ tgl_indo($_GET['dari_tanggal']).' s/d '.tgl_indo($_GET['sampai_tanggal']) }}</p>
                <p><a target="_blank" href="{{ url('laporan_pdf?dari_tanggal=').$_GET['dari_tanggal'].'&sampai_tanggal='.$_GET['sampai_tanggal'] }}" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> Export PDF</a></p>
              </center>
              <div style="padding-left: 10px; padding-right: 10px" class="table-responsive">
                <table class="table table-sniped" id="data-tabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
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
                        <td>{{ @$d->user->NamaLengkap; }}</td>
                        <td>{{ @$d->buku->Judul; }}</td>
                        <td>{{ tgl_indo(@$d->TanggalPeminjaman); }}</td>
                        <td>{{ tgl_indo(@$d->TanggalPengembalian); }}</td>
                        <td>{{ @$d->StatusPeminjaman; }}</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
              </div>
            @endif
          </div>
        </div>
      
    </div>
    </div>
    
  </div> 
@endsection