
@extends('adminlte::page')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Data Penulis</h1>
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
                    Data Barang Keluar
                    <a href="{{route('barang_keluar.create')}}" class="btn btn-outline-primary float-right">Tambah Barang Keluar</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Jenis Hp</th>
                                <th>Tanggal</th>
                                <th>Jumlah Masuk</th>
                                <th>Aksi</th>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($barangkeluar as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                 <td>{{$data->namabarang}}</td>
                                <td>{{$data->tanggal}}</td>
                                 <td>{{$data->jumlahkeluar}}</td>


                                <td>
                                    <form action="{{route('barang_keluar.destroy' , $data->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('barang_keluar.edit', $data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('barang_keluar.show' ,$data->id)}}" class="btn btn-outline-warning">Show</a>
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


