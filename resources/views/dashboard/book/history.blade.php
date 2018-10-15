@extends('layouts.app')

@section('cssplus')
<style>
    .left-sidebar {
        background: #242a33;
    }
    strong {
        font-weight: bolder;
        color: red;
    }
</style>
@endsection

@section('nav')
@include('layouts.header')
@include('layouts.navLeft')
@endsection

@section('content')
<div class="row">
    <!-- column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">History Buku</h4>
                <h6 class="card-subtitle">List penjualan buku yang sudah terjual.</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Buku</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ date('d-m-Y', strtotime($book->title)) }}</td>
                                <td>
                                    @foreach($book->genres as $genre)
                                    <a href="{{ route('genre', $genre->name) }}" class="label label-info">{{ $genre->name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.book') }}/{{ $book->slug }}" class="btn waves-effect waves-light btn-success"> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection