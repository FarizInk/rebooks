@extends('layouts.app')

@section('cssplus')
<style>
    .left-sidebar {
        background: #242a33;
    }
    .label {
        display: inline-block;
        padding: 6px 10px;
    }

</style>
@endsection

@section('nav')
@include('layouts.header')
@include('layouts.navLeft')
@endsection

@section('content')
@if(session('response'))
<div class="alert alert-success" role="alert">
  {{ session('response') }}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Penjualan Buku</h4>
                <h6 class="card-subtitle">List penjualan buku yang belum terjual.</h6>
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
                            @foreach($books as $key => $book)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ ucfirst($book->title) }}</td>
                                <td>{{ date('d-m-Y', strtotime($book->created_at)) }}</td>
                                <td>
                                    @foreach($book->genres as $genre)
                                    <a href="{{ route('genre', $genre->name) }}" class="label label-info">{{ $genre->name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.book') }}/{{ $book->slug }}/edit" class="btn waves-effect waves-light btn-primary"> Edit</a>
                                    <a href="#" onclick="document.getElementById('form-id').submit();" class="btn waves-effect waves-light btn-danger"> Hapus</a>
                                    <a href="{{ route('dashboard.book') }}/{{ $book->slug }}" class="btn waves-effect waves-light btn-success"> Detail</a>
                                    <form id="form-id" action="{{ route('dashboard.book.delete') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $book->id }}">
                                    </form>
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