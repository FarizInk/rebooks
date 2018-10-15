@extends('layouts.app')

@extends('layouts.app')

@section('cssplus')
<style>
    @media (min-width: 1024px) {
        .page-wrapper {
            margin-left: 0;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
	<div class="row">
	    <!-- Column -->
	    <div class="col-lg-12 col-xlg-9 col-md-7">
	        <div class="card">
	            <div class="card-body">
	                <center>
	                    <div class="col-lg-12">
	                        <span style="font-weight: bold;">Verifikasi Berhasil</span>
	                    </div>
	                    <div class="col-lg-12">
	                    	@if(Auth::user())
	                    	<span style="font-size: 15px; font-weight: 100;">
	                        	Email Anda berhasil diverifikasi Klik disini untuk menuju <a href="{{url('/')}}">halaman awal</a>
	                        </span>
	                        @else
	                        <span style="font-size: 15px; font-weight: 100;">
	                        	Email Anda berhasil diverifikasi Klik disini untuk <a href="{{url('/login')}}">login</a>
	                        </span>
	                        @endif
	                    </div>
	                </center>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection