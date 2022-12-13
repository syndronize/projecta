@extends('template')
@section('title','Data Barang')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Tabel Penyewaan Barang</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Penyewaan Barang</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a class="btn btn-primary " href="{{route('sewa.create')}}" >
                    <i class="micon dw dw-add"></i> Ajukan Penyewaan
                </a>
            </div>
        </div>
    </div>
    
    <div class="pd-20 card-box mb-30">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr align="center">
                        <th scope="col">No.</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">Lama Sewa</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sewa as $no=>$sewa )
                    <tr align="center">
                        <td>{{$no+1}}</td>
                        <td>{{$sewa->username}}</td>
                        <td>{{$sewa->nama}}</td>
                        <td>{{$sewa->jumlah}}</td>
                        <td>Rp. {{number_format($sewa->total)}}</td>
                        <td>{{$sewa->lama_sewa}} Hari</td>
                        <td>{{$sewa->tgl_kembali}}</td>
                        <td >
                            <button onclick="kembalikan('{{$sewa->id}}','{{($sewa->barang_id)}}','{{($sewa->user_id)}}')" type="button" class="btn btn-light btn-sm">Kembalikan</button>
                            <a onclick="return confirm('Are You Sure ?')" href="{{ route('sewa.delete', $sewa->id) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('sewa.delete', $sewa->id) }}')"><i class="fa fa-trash">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
							
</div>

<div class="modal fade" id="datakembali">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><div id="title"></div></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{route('pengembalian')}}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-lg-4">
                        <input type="hidden" name="user_id" id="user_id" >
                        <input type="hidden" name="barang_id" id="barang_id" >
                        <input type="hidden" name="sewa_id" id="id" >
                        <div class="form-group">
                            <label>Peforma</label>
                            <input class="form-control" id="peforma" name="peforma" type="number" placeholder="Type Here">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kualitas</label>
                            <input class="form-control" id="kualitas" name="kualitas" type="number" placeholder="Type Here">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Pelayanan</label>
                            <input class="form-control" id="pelayanan" name="pelayanan" type="number" placeholder="Type Here">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary">Simpan</button>
            </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
function kembalikan(id,user_id,barang_id){
    id= id;
    user_id = user_id;
    barang_id = barang_id;
    $('#user_id').val(user_id);
    $('#barang_id').val(barang_id);
    $('#id').val(id);

    $('#title').html('Beri Penilaian');
    $('#datakembali').modal('show');
}

</script>
@endsection