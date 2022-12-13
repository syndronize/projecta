@extends('template')
@section('title','Dashboard')

@section('content')
<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="{{'/'}}deskapp/vendors/images/banner-img.png" alt="">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back <div class="weight-600 font-30 text-blue"> {{Session()->get('username')}} !</div>
            </h4>
            <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id=""></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">2020</div>
                    <div class="weight-600 font-14">Member</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id=""></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">400</div>
                    <div class="weight-600 font-14">Total Barang</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id=""></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">350 Hari</div>
                    <div class="weight-600 font-14">Total Sewa</div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Striped table start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Hasil Penilaian</h4>
        </div>
        
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Hasil Akhir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
            </tr>
            
        </tbody>
    </table>
@endsection
