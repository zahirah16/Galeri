<!DOCTYPE html>
<html>
<head>
	<title>Laporan Peminjaman Buku</title>
</head>
<body>

            @if (@$data!=null)
              <center>
                <h3>Laporan Peminjaman Buku</h3>
                <p>Periode : {{ tgl_indo($_GET['dari_tanggal']).' s/d '.tgl_indo($_GET['sampai_tanggal']) }}</p>
              </center>
              <div style="padding-left: 10px; padding-right: 10px" class="table-responsive">
                <table class="table table-sniped" id="data-tabel" width="100%" border="1" cellspacing="0" cellpadding="4">
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
</body>
</html>