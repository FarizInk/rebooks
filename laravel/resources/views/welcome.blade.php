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
	@media (max-width: 1023px){
		.page-wrapper {
		    margin-left: 0px;
		}	
	}
	.nav-custom {
		display: none;
	}
</style>
@endsection

@section('nav')
@include('layouts.header')
@endsection
@section('content')
@endsection