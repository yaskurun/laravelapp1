<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data Pegawai</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <style>
            body {
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit Pegawai</h3>
                            <a href="/pegawai" class="btn btn-primary">Kembali</a>
                            <br>
                            <br>
                            {{-- menampilkan error validasi --}}
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @foreach($pegawai as $m)
                            <form action="/pegawai/update" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $m->id }}">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" required="required" value="{{ $m->nama }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" required="required">{{ $m->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>