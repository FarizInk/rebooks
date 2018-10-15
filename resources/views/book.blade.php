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
	.profile-custom {
		text-align: left;
		margin-top: 3px;
		padding-top: 3px;
		border-top: 1px solid #ececec;
	}
	.profile-col {
		font-weight: 500;
		margin-bottom: 3px;
	}
	.book-custom {
		text-align: left;
		margin-top: 3px;
		padding-top: 7px;
		border-top: 1px solid #ececec;
	}
	.book-col {
		font-weight: 500;
		margin: 3px 0px;
	}
	.label {
	    display: inline-block;
	    padding: 6px 10px;
	}
	.img {
		max-width: 150px;
	}
</style>
@endsection
@section('nav')
@include('layouts.header')
@endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a onclick="window.history.back();" href="#" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
    </div>
@foreach($data as $book)
	@if($book->sold == 1)
    <div class="col-md-5 align-self-center">
		<div class="alert alert-danger" role="alert">
		  Barang sudah terjual.
		</div>
    </div>
    @endif
</div>

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{!! asset('images/profile') !!}/{{ $book->user['img'] }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $book->user->name }}</h4>
                    <div class="row text-center justify-content-md-center">
                        @if($book->user->verified == 1 )
                        	<div class="col-12" style="color: white; background: green; padding: 3px; border-radius: 3px; margin-bottom: 12px;"><i class="mdi mdi-account-check"></i> <font class="font-medium">Terverifikasi</font></div>
                        @else
                        	<div class="col-12" style="color: white; background: red; padding: 3px; border-radius: 3px; margin-bottom: 12px;"><i class="mdi mdi-account-remove"></i> <font class="font-medium">Belum Terverifikasi</font></div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 profile-custom">
							<div class="profile-col">Email :</div> {{ $book->user->email }}
                        </div>
                        <div class="col-md-12 profile-custom">
							<div class="profile-col">Nomor HP :</div> {{ $book->user->phone }}
                        </div>
                        <div class="col-md-12 profile-custom">
							<div class="profile-col">Kota :</div> 
							@foreach($cities as $city)
								@if($book->user->city_id == $city->id)
									{{ $city->name }}
								@endif
							@endforeach
                        </div>
                        <div class="col-md-12 profile-custom">
							<div class="profile-col">Alamat :</div> {{ $book->user->address }}
                        </div>
                        <div class="col-md-12 profile-custom">
							<div class="profile-col">Jenis Kelamin :</div> 
							@if($book->user->gender == "male")
								Laki - Laki
							@else
								Perempuan
							@endif
                        </div>
                        <div class="col-md-12"> 
							@if(Auth::user())
								@if($book->user->id == Auth::user()->id)
								<a href="{{ route('dashboard.profile') }}" class="btn btn-warning"><i class="mdi mdi-pencil"></i> Edit</a>
								@endif
							@endif
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<img class="col-md-12" src="{!! asset('images/cover') !!}/{{ $book->cover }}" alt="">
					</div>
					<div class="col-md-8">
						<h2 style="font-weight:bold;">{{ ucfirst($book->title) }}</h2>
						@foreach($book->genres as $genre)
		                <a href="{{ route('genre', $genre->name) }}" class="label label-info">{{ $genre->name }}</a>
		                @endforeach
	                    <div class="col-md-12 profile-custom" style="margin-top: 12px;">
							{{ ucfirst($book->description) }}
	                    </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 book-custom" style="margin-top: 12px;">
						<span class="book-col">Di jual pada :</span> 
						{{ date('d-m-Y', strtotime($book->created_at)) }}
                    </div>
                    <div class="col-md-12 book-custom" style="margin-top: 12px;">
						<span class="book-col">Kondisi :</span> 
						@if($book->condition == "new")
						Baru
						@else
						Bekas
						@endif
                    </div>
                    <div class="col-md-12 book-custom" style="margin-top: 12px;">
						<span class="book-col">Harga :</span> 
						Rp {{ $book->price }}
                    </div>
                    <div class="col-md-12 book-custom" style="margin-top: 12px;">
						<span class="book-col">Pengarang :</span> 
						{{ ucfirst($book->author_book) }}
                    </div>
                    <div class="col-md-12 book-custom" style="margin-top: 12px;">
						<span class="book-col">Penerbit :</span> 
						{{ ucfirst($book->publisher_book) }}
                    </div>
                    <div class="col-md-12 book-custom" style="margin-top: 12px;">
						<span class="book-col">Tahun Terbit :</span> 
						{{ $book->publication_year_book }}
                    </div>
                    <div class="col-md-12 book-custom" style="margin-top: 12px;">
						<div class="book-col">Foto :</div> 
						@foreach($book->images as $image)
						<a href="{!! asset('images/post') !!}/{{ $image->name }}"><img class="img" src="{!! asset('images/post') !!}/{{ $image->name }}"></a>
						@endforeach
                    </div>
                    <div class="col-md-12" style="margin-top: 12px;"> 
						@if(Auth::user())
							@if($book->user_id == Auth::user()->id && $book->sold == 0)
							<a href="{{ route('dashboard.book.edit', $book->slug) }}" class="btn btn-warning"><i class="mdi mdi-pencil"></i> Edit</a>
							<form action="{{ route('dashboard.book.sold', $book->slug) }}" method="post" style="margin-top: 12px;">
								{{ csrf_field() }}
								<input type="submit" class="btn btn-danger" value="Terjual">
							</form>
							@endif
						@endif
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection