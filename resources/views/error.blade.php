@extends('layouts.app')
@section('cssplus')
<style>
    @media (min-width: 1024px) {
        .page-wrapper {
            margin-left: 0;
        }
    }
	@media (min-width: 768px){
		.mini-sidebar .page-wrapper {
		    margin-left: 0px;
		}
	}
	.nav-custom {
		display: none;
	}
	.label {
	    display: inline-block;
	    padding: 6px 10px;
	}
	.custom-profile img {
	    width: 45px;
	    border-radius: 99px;
	}
	.custom-profile {
	    padding: 12px;
	    border-radius: 3px;
	}
	/*.thumbnail-post {
	    height: 300px;

	    overflow: hidden;
	}
	.thumbnail-post img {
	    min-height: 300px;
	}*/
</style>
@endsection
@section('content')
<body class="fix-header card-no-border fix-sidebar">
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404 NOT FOUND</h1>
                <h3 class="text-uppercase">Halaman Tidak Ditemukan !</h3>
                <a href="{{ route('index') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Kembali ke Awal</a> </div>
        </div>
    </section>
@endsection