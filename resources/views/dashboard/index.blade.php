@extends('layouts.app')

@section('cssplus')
<style>
.left-sidebar {
    background: #242a33;
}
</style>
@endsection

@section('nav')
@include('layouts.header')
@include('layouts.navLeft')
@endsection

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <center>
                    <div class="col-lg-12">
                        <span style="font-weight: bold;">Total Buku</span>
                    </div>
                    <div class="col-lg-12">
                        <span style="font-size: 50px; font-weight: 100;">{{ $total }}</span>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <center>
                    <div class="col-lg-12">
                        <span style="font-weight: bold;">Buku Belum Terjual</span>
                    </div>
                    <div class="col-lg-12">
                        <span style="font-size: 50px; font-weight: 100;">{{ $sell }}</span>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <center>
                    <div class="col-lg-12">
                        <span style="font-weight: bold;">Buku Terjual</span>
                    </div>
                    <div class="col-lg-12">
                        <span style="font-size: 50px; font-weight: 100;">{{ $sold }}</span>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection
