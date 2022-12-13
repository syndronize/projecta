@extends('template')
@section('title','Form User')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Form User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Member</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form User</li>
                    </ol>
                </nav>
            </div>
            
        </div>
    </div>
    
    <div class="pd-20 card-box mb-30">
        <div class="col-md-12 col-sm-12">
            <h4 class="text-center text-blue mb-3">Form User</h4>
        </div>
        <form action="{{ isset($member) ? route('member.update', $member->id) : route('member.store') }}"
            method="POST">
            @csrf
            @if(isset($member))
            @isset($member)
            @method('put')
            @endif
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('username') {{ 'is-invalid' }} @enderror"
                        value="{{ old('username') ?? $member->username ?? ''}}" name="username"
                        placeholder="Type Here">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') {{ 'is-invalid' }} @enderror"
                        value="{{ old('password') ?? $member->password ?? ''}}" name="password"
                        placeholder="********">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label >Pilih Role</label>
                            <select class="custom-select col-12" name="role">
                                <option selected disabled>Pilih</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
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