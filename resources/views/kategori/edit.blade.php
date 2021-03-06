@extends ('adminlte::page')

@section ('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data kategori</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form action="{{route('kategori.update', $barang->id)}}" method="post">
                        @csrf
                        @method ('put')
                        <div class="form-group">
                            <label for="">nama barang</label>
                            <input type="text" name="nama" value="{{$kategori->nama}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}} </strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

