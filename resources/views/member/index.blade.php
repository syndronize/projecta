@extends('template')
@section('title','Data User')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Tabel User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel User</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a class="btn btn-primary " href="{{route('member.create')}}" >
                    <i class="micon dw dw-add"></i> User
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
                        <th scope="col">Username</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($member as $no=>$member )
                    <tr style="align:center">
                        <td>{{$no+1}}</td>
                        <td>{{$member->username}}</td>
                        <td>{{$member->role}}</td>
                        <td width="15%">
                            <a onclick="return confirm('Are You Sure ?')" href="{{ route('member.delete', $member->user_id) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('member.delete', $member->user_id) }}')"><i class="fa fa-trash">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
							
</div>
@endsection