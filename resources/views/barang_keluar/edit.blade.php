@extends ('adminlte::page')

@section ('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Barang Keluar</h1>
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
                    <form action="{{route('barang_keluar.update', $barangkeluar->id)}}" method="post">
                        @csrf
                        @method ('put')
                        <div class="form-group">
                            <label for="">namabarang</label>
                            <input type="text" name="namabarang" value="{{$barangkeluar->namabarang}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">jumlah</label>
                            <input type="number" name="jumlah" value="{{$barangkeluar->jumlah}}" class="form-control @error('amount') is-invalid @enderror">
                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" value="{{$barangkeluar->tanggal}}" class="form-control @error('amount') is-invalid @enderror">
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

