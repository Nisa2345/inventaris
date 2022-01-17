@extends('adminlte::page')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Data pinjam barang</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data pinjam barang</div>
                <div class="card-body">
                    <form action="{{route('pinjambarang.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">namabarang</label>
                            <select name="id_barang" class="form-control @error('id') is-invalid @enderror" >
                                @foreach($produk as $data)
                                    <option value="{{$data->id}}">{{$data->namabarang}}</option>
                                @endforeach
                            </select>
                            @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah pinjam barang</label>
                            <input type="number" name="jumlah" class="form-control @error('amount') is-invalid @enderror">
                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
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
