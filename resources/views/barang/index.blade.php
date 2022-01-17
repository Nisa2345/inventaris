
@extends('adminlte::page')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Data Barang</h1>
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
                <div class="card-header">
                    Data Barang
                    <a href="{{route('barang.create')}}" class="btn btn-outline-primary float-right">Tambah Barang</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>

                                <th>No</th>
                                <th>nama barang</th>
                                <th>stock</th>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($barang as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->namabarang}}</td>
                                <td>{{$data->stock}}</td>


                                <td>
                                    <form action="{{route('barang.destroy' , $data->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('barang.edit', $data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('barang.show' ,$data->id)}}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('apakah anda yakin menghapus ini?');">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


