@extends('template')
@section('title','Data Barang')
@section('style')
<link rel="stylesheet" type="text/css" href="{{('/')}}deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{('/')}}deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{('/')}}deskapp/src/plugins/jquery-steps/jquery.steps.css">
@endsection
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
        <table class="data-table table stripe hover nowrap">
                <thead class="text-center">
                    <tr align="center">
                        <th class="table-plus datatable-nosort">No.</th>
                        <th>Nama Peminjam</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Lama Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th class="datatable-nosort">Action</th>
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
<script src="{{('/')}}deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{('/')}}deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="{{('/')}}deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="{{('/')}}deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="{{('/')}}deskapp/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<!-- Datatable Setting js -->
<script src="{{('/')}}deskapp/vendors/scripts/datatable-setting.js"></script>
</body>
<!-- Step Wizard Setting -->
<script src="{{('/')}}deskapp/src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="{{('/')}}deskapp/vendors/scripts/steps-setting.js"></script>
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