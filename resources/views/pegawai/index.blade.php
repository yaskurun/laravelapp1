<!DOCTYPE html>
<html>
    <head>
        <title>Data Pegawai</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <style>
            body {
                margin-top: 15px;
            }
            .pagination li {
                float:left;
                list-style-type: none;
                margin:5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1>Data Pegawai</h1>
                    <p>Cari Data Pegawai :</p>
                    <form action="/pegawai/cari" mehod="GET" class="form-inline">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="text" value="{{ Request()->cari }}" class="form-control" name="cari" id="inlineFormInputName2" placeholder="Jane Doe">
                        <button type="submit" class="btn btn-primary">CARI</button>
                    </form>
                    <br>
                    <a href="/pegawai/tambah" class="btn btn-primary">+ Tambah Pegawai Baru</a>
                    <br>
                    <br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                        @foreach($pegawai as $m)
                        <tr>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->alamat }}</td>
                            <td>
                                <a class="btn btn-warning" href="/pegawai/edit/{{ $m->id }}">Edit</a>
                                <a class="btn btn-danger" href="/pegawai/hapus/{{ $m->id }}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    Halaman : {{ $pegawai->currentPage() }} <br>
                    Jumlah Data : {{ $pegawai->total() }} <br>
                    Data per Halaman : {{ $pegawai->perPage() }}<br>
                    <br>
                    {{ $pegawai->links() }}
                </div>
            </div>
        </div>
    </body>
</html>