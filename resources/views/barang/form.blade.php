@extends('template')
@section('title','Form Barang')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Form Barang</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Barang</li>
                    </ol>
                </nav>
            </div>
            
        </div>
    </div>
    
    <div class="pd-20 card-box mb-30">
        <div class="col-md-12 col-sm-12">
            <h4 class="text-center text-blue mb-3">Form Barang</h4>
        </div>
        <form action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($barang))
            @isset($barang)
            @method('put')
            @endif
            @endif
            <div class="row">
                

                <div class="col-md-6 col-sm-12">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('nama') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nama') ?? $barang->nama ?? ''}}" name="nama"
                        placeholder="Type Here">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control @error('harga') {{ 'is-invalid' }} @enderror"
                        value="{{ old('harga') ?? $barang->harga ?? ''}}" name="harga"
                        placeholder="Type Here">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar"
                            class="form-control-file @error('gambar') {{ 'is-invalid' }} @enderror"
                            value="{{ old('gambar') ?? $barang->gambar ?? ''}}">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <p>Keterangan</p>
                        <textarea class="textarea_editor form-control border-radius-0" name="keterangan" rows="10" cols="50" placeholder="Type Here for Description"
                    class="form-control @error('keterangan') {{ 'is-invalid' }} @enderror">{{ old('keterangan') ?? $project->keterangan ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right" >Submit</button>
                    </div>
                </div>
                
            </div>
            
        </form>
    </div>
							
</div>
@endsection