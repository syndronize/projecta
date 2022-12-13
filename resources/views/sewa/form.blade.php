@extends('template')
@section('title','Form Penyewaan')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Form Penyewaan</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Sewa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Penyewaan</li>
                    </ol>
                </nav>
            </div>
            
        </div>
    </div>
    
    <div class="pd-20 card-box mb-30">
        <div class="col-md-12 col-sm-12">
            <h4 class="text-center text-blue mb-3">Form Penyewaan</h4>
        </div>
        <form action="{{ isset($sewa) ? route('sewa.update', $sewa->id) : route('sewa.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($sewa))
            @isset($sewa)
            @method('put')
            @endif
            @endif
            <div class="row">
                <input type="hidden" name="user_id" value="{{session('user_id')}} ">
                <div class="col-md-6 col-sm-12">
                    
                    <div class="form-group"  >
                        <label>List Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control @error('barang_id') {{ 'is-invalid' }} @enderror">
                            <option selected disabled>Select</option>
                            @foreach($barang as $no => $barang)
                            <option value="{{ $barang->id }}">
                                {{ $barang->nama}}</option>
                            @endforeach
                        </select>
                        @if(isset($sewa))
                        <script>
                            document.getElementById('barang_id').value =
                                '<?php echo $sewa->barang_id ?>'
                        </script>
                        @endif
                        @error('barang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') {{ 'is-invalid' }} @enderror"
                        value="{{ old('jumlah') ?? $sewa->jumlah ?? ''}}" name="jumlah"
                        placeholder="Type Here">
                        @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <input type="hidden" name="aktif" value="0">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="">Lama Penyewaan</label>
                    <div class="form-group input-group mb-3">
                        <input type="number" class="form-control  @error('lama_sewa') {{ 'is-invalid' }} @enderror"
                        value="{{ old('lama_sewa') ?? $sewa->lama_sewa ?? ''}}" name="lama_sewa"
                        placeholder="Type Here">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Hari</span>
                            </div>
                        @error('lama_sewa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" class="form-control @error('tgl_kembali') {{ 'is-invalid' }} @enderror"
                        value="{{ old('tgl_kembali') ?? $sewa->tgl_kembali ?? ''}}" name="tgl_kembali"
                        > 
                        @error('tgl_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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