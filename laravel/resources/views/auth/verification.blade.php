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
	                        <span style="font-weight: bold;">Daftar Berhasil</span>
	                    </div>
	                    <div class="col-lg-12">
	                        <span style="font-size: 15px; font-weight: 100;">
	                        	Silahkan anda cek email anda.
	                        </span>
	                    </div>
	                </center>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection