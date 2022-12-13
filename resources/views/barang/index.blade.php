@extends('template')
@section('title','Data Barang')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Tabel Barang</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Barang</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a class="btn btn-primary " href="{{route('barang.create')}}" >
                    <i class="micon dw dw-add"></i> Barang
                </a>
            </div>
        </div>
    </div>
    
    <div class="pd-20 card-box mb-30">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr style="align:center;">
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($barang as $no=>$barang )
                    <tr style="align:center">
                        <td>{{$no+1}}</td>
                        <td>{{$barang->nama}}</td>
                        <td>Rp. {{number_format($barang->harga)}}</td>
                        <td>{{$barang->keterangan}}</td>
                        <td><img class="zoom" src="/gambar/{{$barang->gambar}}" alt="Image Not Found" class="light-logo" style="width: 10em;"></td>
                        <td width="15%">
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm"><i class="icon-copy fa fa-pencil"></i></a>
                            <a onclick="return confirm('Are You Sure ?')" href="{{ route('barang.delete', $barang->id) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('barang.delete', $barang->id) }}')"><i class="fa fa-trash">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
							
</div>
@endsection