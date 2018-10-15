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

@section('nav')
@include('layouts.header')
@endsection

@section('content')
<div class="row">
	@foreach($books as $book)
    <div class="col-lg-4 col-xlg-3">
        <div class="card">
            <div class="thumbnail-post">
                <img class="card-img-top img-responsive" src="{!! asset('images/cover') !!}/{{ $book->cover }}" alt="{{ ucfirst($book->title) }}">
            </div>
            <div class="card-body">
                <h3 class="font-normal"><a href="{{ route('index') }}/{{ $book->slug }}">{{ ucfirst($book->title) }}</a></h3>
                @foreach($book->genres as $genre)
                <a href="{{ route('genre', $genre->name) }}" class="label label-info">{{ $genre->name }}</a>
                @endforeach
                <div class="d-flex m-t-20">
                    <a class="custom-profile waves-effect waves-dark" href="#"><img src="{!! asset('images/profile') !!}/{{ $book->user['img'] }}" alt="user" class="profile-pic" /><span style="margin-left: 12px;">{{ $book->user->name }}</span></a>
                    <div class="ml-auto align-self-center">
                        <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-share-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
	{{-- <nav aria-label="Page navigation example">
		<ul class="pagination">
			<li class="page-item"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav> --}}
@endsection