@extends('adminlte::page')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Barang</h1>
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
                <div class="card-header">Data Barang</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">namabarang</label>
                        <input type="text" name="merekhp" value="{{$barang->namabarang}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">stock</label>
                        <input type="text" name="jenishp" class="form-control" value="{{$barang->stock}}" readonly>
                    </div>

                    <div class="form-group">
                        <a href="{{url('admin/barang')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

